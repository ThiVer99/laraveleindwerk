<?php

use App\Http\Controllers\AdminColorsController;
use App\Http\Controllers\AdminGendersController;
use App\Http\Controllers\AdminSizesController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\AdminBrandsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItunesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShopController;
use App\Models\Post;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get("/", function () {
//    return view("home");
//});
Route::get('/', [HomeController::class, 'index'])->name('frontend.home');
Route::get("/shop", [ShopController::class, "index"])->name("frontend.shop");
Route::get('/shop/{id}', [ShopController::class, 'show'])->name('frontend.show');
Route::post('/', [CartController::class, 'store'])->name('cart.store');
Route::get("/cart", [CartController::class, "index"])->name("frontend.cart");
Route::get("/order-details", [CartController::class, "orderDetails"])->name("frontend.orderDetails");
Route::get("/orders", [OrdersController::class, "frontendIndex"])->name("frontend.orders");

Route::post("/checkout", [CartController::class, "checkout"])->name("frontend.checkout");
Route::get("/success", [CartController::class, "success"])->name("frontend.checkout.success");
Route::get("/cancel", [CartController::class, "cancel"])->name("frontend.checkout.cancel");
Route::post("/webhook",[CartController::class,'webhook'])->name('frontend.checkout.webhook');

Route::get('contactformulier', [ContactController::class, 'create'])->name('contact.create');
Route::post('contactformulier', [ContactController::class, 'store'])->name('contact.store');

Route::get('/itunes', [ItunesController::class, 'index'])->name('itunes.index');

/**backend**/

Route::group(["prefix" => "admin", "middleware" => ['auth', 'verified' ,"admin"]], function () {
    Route::get("/", [
        BackendController::class,
        "index",
    ])->name("backend.home");
    //Product Routes
    Route::resource('products', ProductsController::class);
    Route::post('products/restore/{product:id}', [ProductsController::class, 'productRestore'])->name('products.restore');
    Route::get('products/brand/{id}', [ProductsController::class, 'productsPerBrand'])->name('admin.productsPerBrand');
    Route::resource('orders', OrdersController::class);
    Route::resource('brands', AdminBrandsController::class);
    Route::post('brands/restore/{brand:id}', [AdminBrandsController::class, 'brandRestore'])->name('brands.restore');
    Route::resource('genders', AdminGendersController::class);
    Route::resource('colors', AdminColorsController::class);
    Route::resource('sizes', AdminSizesController::class);
    Route::resource('productcategories', ProductCategoryController::class);

    Route::group(["middleware" => 'admin'], function () {
        Route::resource("users", AdminUsersController::class);
        Route::post('users/restore/{user}', [AdminUsersController::class, 'userRestore'])->name('admin.userrestore');
    });
});

Auth::routes(['verify' => true]);
