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
],function (){
    Route::get('/', 'FrontendController@index')->name('home');
    Route::get('/{slug}~{id}','ProductController@index')->name('detail');
    Route::get('/brand/{slug}','BrandController@index')->name('brand');
    Route::get('/cart', 'CartController@index')->name('cart');
    Route::get('/check-out', 'CheckoutController@index')->name('check.out');
    Route::get('/login', 'LoginController@index')->name('login');
    Route::get('/register', 'RegisterController@index')->name('register');
});