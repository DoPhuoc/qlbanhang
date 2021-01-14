<?php

namespace App\Providers;

use App\Cart;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        View::composer('frontend.commons.header', function ($view) {
            $categories = DB::table('categories')
                ->get();
            $cart = Cart::where('user_id', Auth::id())
                ->whereDoesntHave('bill')->latest()->first();
            $view->with([
                'categories' => $categories,
                'cart' => $cart ?? new Cart()
            ]);
        });
        View::composer('frontend.commons.banner', function ($view) {
            $newBanner = DB::table('banners')
                ->where('status',1)
                ->offset(0)
                ->limit(8)
                ->get();
            $view->with('newBanner', $newBanner);
        });
        View::composer('frontend.commons.sidebar', function ($view) {
            $brands = DB::table('brands')->where('status',0)
                ->get();
            $categories = DB::table('categories')
                ->get();
            $view->with('brands', $brands);
            $view->with('categories', $categories);
        });
    }
}
