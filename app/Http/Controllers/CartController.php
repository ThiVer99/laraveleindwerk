<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Order;
use App\Models\Product;
use App\Models\Size;
use Gloudemans\Shoppingcart\Facades\Cart;
use Http\Discovery\Exception\NotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CartController extends Controller
{
    //
    public function index()
    {
        return view("cart");
    }

    public function store(Request $request)
    {
        $product = Product::findOrFail($request->input('product_id'));
        $color = Color::findOrFail($request->color);
        $size = Size::findOrFail($request->size);
        Cart::add(
            $product->id,
            $product->name,
            1,
            $product->price,
            0,
            ["size" => $size, "color" => $color]
        )->associate('App\Models\Product');

        return redirect()->back()->with('message', 'Successfully added!');
    }

    public function checkout()
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));

        $products = Cart::content();
        $lineItems = [];
        $totalPrice = 0;

        foreach ($products as $product) {
            $totalPrice += $product->price * $product->qty;
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $product->name,
                    ],
                    'unit_amount' => $product->price * 100,
                ],
                'quantity' => $product->qty,
            ];
        }

        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('frontend.checkout.success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('frontend.checkout.cancel', [], true),
        ]);

        $order = new Order();
        $order->status = 'unpaid';
        $order->total_price = $totalPrice;
        $order->session_id = $checkout_session->id;
        $order->user_id = Auth::id();
        $order->save();
        foreach (Cart::content() as $cartItem) {
            $order->products()->attach($cartItem->id, [
                'product_price' => $cartItem->price,
                'color_id' => $cartItem->options->color->id,
                'size_id' => $cartItem->options->size->id,
                'quantity' => $cartItem->qty,
            ]);
        }

        return redirect($checkout_session->url);
    }

    public function success()
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));

        try {
            $session = $stripe->checkout->sessions->retrieve($_GET['session_id']);

            if (!$session) {
                throw new NotFoundException();
            }
            $customer = $session->customer_details;

            $order = Order::where('session_id', $session->id)->first();
            if (!$order) {
                throw new NotFoundHttpException();
            }
            if ($order->status == 'unpaid') {
                $order->status = 'paid';
                $order->save();
            }
            //clear cart content n after success order
            Cart::destroy();

            return view('checkout.checkout-success', compact('customer'));
        } catch (\Exception $e) {
            throw new NotFoundHttpException();
        }
    }

    public function cancel()
    {
        return view('checkout.checkout-cancel');
    }

    public function webhook()
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));

// This is your Stripe CLI webhook secret for testing your endpoint locally.
        $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

        $payload = @file_get_contents('php://input');
        $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            // Invalid payload
            return response('', 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            return response('', 400);
        }

// Handle the event
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;
                $sessionId = $session->id;

                $order = Order::where('session_id', $session->id)->first();
                if ($order && $order->status == 'unpaid') {
                    $order->status = 'paid';
                    $order->save();
                    //send email to customer
                }


            default:
                echo 'Received unknown event type ' . $event->type;
        }

        return response('');
    }
}
