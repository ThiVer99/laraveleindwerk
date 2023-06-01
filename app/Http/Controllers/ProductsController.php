<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Gender;
use App\Models\Keyword;
use App\Models\Photo;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        //variabelen worden ingeladen op livercomponent AdminProducts
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        //
        $keywords = Keyword::all();
        $productcategories = ProductCategory::all();
        $brands = Brand::all();
        $genders = Gender::all();
        return view('admin.products.create', compact('keywords', 'productcategories', 'brands','genders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            'name' => ['required', 'between:3,255'],
            'brand_id' => 'required',
            'productcategories' => 'required|min:1',
            'price' => 'required|numeric|between:0,999999.99',
            'keywords' => ['required', Rule::exists('keywords', 'id')],
            'body' => 'required',
            'photo_id' => 'required',
            'gender_id' => 'required'
        ],
            [
                'name.required' => 'Product name is required',
                'title.between' => 'Product name between 3 and 255 characters required',
                'brand_id.required' => 'select a brand',
                'body.required' => 'Message is required',
                'productcategories.required' => 'Select at least one category',
                'keywords.required' => 'Please check minimum one keyword',
                'photo_id.required' => 'Upload a picture of the product',
                'gender_id.required' => 'Please select a gender'
            ]);
        $product = new Product();
        $product->name = $request->name;
        $product->brand_id = $request->brand_id;
        $product->body = $request->body;
        $product->price = $request->price;
        $product->gender_id = $request->gender_id;

        if ($file = $request->file("photo_id")) {
            $path = request()
                ->file("photo_id")
                ->store("products");

            $photo = Photo::create(["file" => $path]);
            //update photo_id (FK in users table)
            $product->photo_id = $photo->id;
        }
        $product->save();
        /*wegschrijven van meerder rollen in de tussentabel*/
        foreach ($request->keywords as $keyword) {
            $keywordfind = Keyword::findOrFail($keyword);
            $product->keywords()->save($keywordfind);
        }
        /*wegschrijven van meerder productcategorieen in de tussentabel*/

        $product->productcategories()->sync($request->productcategories, true);

        return redirect()->route('products.index')->with([
            'alert' => [
                'message' => 'Product added',
                'type' => 'success'
            ]
        ]);
        //return back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        //
        $brands = Brand::all();
        $product = Product::findOrFail($id);
        $productCategories = ProductCategory::all();
        $genders = Gender::all();
        return view('admin.products.edit', compact('product', 'productCategories', 'brands','genders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        //
        request()->validate([
            'name' => ['required', 'between:2,255'],
            'price' => 'required|numeric|between:0,999999.99',
            'gender_id' => 'required',
            'body' => 'required'
        ], [
            'name.required' => 'name is required',
            'name.between' => 'Name between 2 and 255 characters required',
            'gender_id.required' => 'Select a Gender'
        ]);
        $product = Product::findOrFail($id);
        $input = $request->all();
        //oude foto verwijderen
        //we kijken eerst of er een foto bestaat
        if ($request->hasFile('photo_id')) {
            $oldPhoto = $product->photo; // de huidige foto van de gebruiker
            $path = request()->file('photo_id')->store('products');
            if ($oldPhoto) {
                unlink(public_path($oldPhoto->file));
                // $oldPhoto->delete();
                $oldPhoto->update(['file' => $path]);
                $input['photo_id'] = $oldPhoto->id;
            } else {
                $photo = Photo::create(['file' => $path]);
                $input['photo_id'] = $photo->id;
            }
        }

        $product->gender_id = $request->gender_id;
        $product->brand_id = $request->brand_id;
        $product->update($input);
        $product->productCategories()->sync($request->categories, true);
        return redirect('/admin/products')->with([
            'alert' => [
                'message' => 'Product updated',
                'type' => 'success'
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $post = Product::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Post not found.'], 404);
        }

        $post->delete();
        return redirect()->route('products.index')->with('message', 'Post deleted!');
    }

    public function productsPerBrand($id)
    {
        $brands = Brand::all();
        $products = Product::where('brand_id', $id)->with(['keywords', 'photo', 'brand', 'productcategories'])->paginate(10);
        return view('admin.products.index', compact('products', 'brands'));
    }
}
