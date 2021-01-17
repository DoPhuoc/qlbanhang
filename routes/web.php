<?php

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

// Route::get('/', function () {
//    return view('welcome');
//});
Route::group([
    'as' => 'fr.',
    'namespace' => 'Frontend',
], function () {
    Route::get('/category/{slug}~{id}', 'ProductController@getProductsBelongCategory')
        ->name('category.product');
    Route::get('/{slug}~{id}', 'ProductController@show')
        ->name('product.show');
    Route::get('/', 'FrontendController@index')->name('home');
    Route::get('/brand/{slug}', 'BrandController@getProductBelongBrand')
        ->name('brand.product');
    Route::get('/cart', 'CartController@index')
        ->middleware('auth')
        ->name('cart');
    Route::post('/cart/add-product', 'CartController@addProduct')
        ->middleware('auth')
        ->name('cart.add_product');
    Route::post('/cart/increase', 'CartController@increaseProduct')
        ->middleware('auth')
        ->name('cart.increase_product');
    Route::post('/cart/decrease', 'CartController@decreaseProduct')
        ->middleware('auth')
        ->name('cart.decrease_product');
    Route::delete('/cart/delete', 'CartController@deleteProduct')
        ->middleware('auth')
        ->name('cart.delete_product');
    Route::post('/cart/checkout', 'CartController@checkout')
        ->middleware('auth')
        ->name('cart.checkout');
    Route::get('/check-out', 'CheckoutController@index')->name('check.out');
    Route::get('/register', 'RegisterController@index')->name('register');
    Route::group(['namespace' => 'Auth', 'as' => 'auth.'], function () {
        Route::get('/login', 'LoginController@showLoginForm')
            ->name('login');
        Route::post('/login', 'LoginController@login')
            ->name('login');
        Route::get('/logout', 'LoginController@logout')
            ->name('logout');
        Route::get('/register', 'RegisterController@showRegistrationForm')
            ->name('register');
        Route::post('/register', 'RegisterController@register')
            ->name('register');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
