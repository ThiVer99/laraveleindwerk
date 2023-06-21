<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
//
        $usersCount = User::count();
        $productCount = Product::count();
        $orderCount = Order::count();

        view()->share('usersCount', $usersCount);
        view()->share('productsCount', $productCount);
        view()->share('ordersCount', $orderCount);
    }
}
