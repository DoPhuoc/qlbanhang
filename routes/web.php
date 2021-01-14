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
    Route::get('/', 'FrontendController@index')->name('home');
    Route::get('/{slug-product}~{id}', 'ProductController@index')->name('product.detail');
    Route::get('/{slug}~{id}', 'ProductController@getProductBelongCategory')->name('category.product');
    Route::get('/brand/{slug}', 'BrandController@getProductBelongBrand')->name('brand.product');
    Route::get('/cart', 'CartController@index')->name('cart');
    Route::get('/check-out', 'CheckoutController@index')->name('check.out');
    Route::get('/register', 'RegisterController@index')->name('register');
    Route::group(['namespace' => 'Auth', 'as' => 'auth.'], function () {
        Route::get('/login', 'LoginController@showLoginForm')
            ->name('login');
        Route::get('/register', 'RegisterController@showRegistrationForm')
            ->name('register');
        Route::post('/register', 'RegisterController@register')
            ->name('register');
    });
});

Route::get('/home', 'HomeController@index')->name('home');
