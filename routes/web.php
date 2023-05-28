<?php

use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\AdminPostsController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItunesController;
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

Route::post("/checkout", [CartController::class, "checkout"])->name("frontend.checkout");
Route::get("/success", [CartController::class, "success"])->name("frontend.checkout.success");
Route::get("/cancel", [CartController::class, "cancel"])->name("frontend.checkout.cancel");
Route::post("/webhook",[CartController::class,'webhook'])->name('frontend.checkout.webhook');

Route::get('contactformulier', [ContactController::class, 'create'])->name('contact.create');
Route::post('contactformulier', [ContactController::class, 'store'])->name('contact.store');
Route::get('/post/{post:slug}', [AdminPostsController::class, 'post'])->name('frontend.post');
Route::get('/category/{category:slug}', [AdminCategoriesController::class, 'category'])->name('category.category');

Route::get('/itunes', [ItunesController::class, 'index'])->name('itunes.index');

/**backend**/

Route::group(["prefix" => "admin", "middleware" => ['auth', 'verified']], function () {
    Route::get("/", [
        BackendController::class,
        "index",
    ])->name("backend.home");
//    Post routes
    Route::resource('posts', AdminPostsController::class, ['except' => ['show']]);
    Route::get('posts/{post:slug}', [AdminPostsController::class, 'show'])->name('posts.show');
    Route::get('authors/{author:name}', [AdminPostsController::class, 'indexByAuthor'])->name('authors');
    Route::post('posts/restore/{post}', [AdminPostsController::class, 'postRestore'])->name('admin.postrestore');
    // Category routes
    Route::resource('categories', AdminCategoriesController::class);
    // Comment routes
    Route::resource('comments', CommentController::class);
    //Product Routes
    Route::resource('products', ProductsController::class);
    Route::get('products/brand/{id}', [ProductsController::class, 'productsPerBrand'])->name('admin.productsPerBrand');
    Route::get('products/gender/men', [ProductsController::class, 'productsPerGenderMen'])->name('products.perGenderMen');
    Route::get('products/gender/women', [ProductsController::class, 'productsPerGenderWomen'])->name('products.perGenderWomen');
    Route::get('products/gender/unisex', [ProductsController::class, 'productsPerGenderUnisex'])->name('products.perGenderUnisex');
    Route::resource('brands', BrandsController::class);
    Route::resource('productcategories', ProductCategoryController::class);

    Route::group(["middleware" => 'admin'], function () {
        Route::resource("users", AdminUsersController::class);
        Route::post('users/restore/{user}', [AdminUsersController::class, 'userRestore'])->name('admin.userrestore');
        Route::get('usersblade', [AdminUsersController::class, 'index2'])->name('users.index2');
    });
});

Auth::routes(['verify' => true]);
