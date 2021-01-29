<?php
Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin',
    'as' => 'admin.'
],function (){
    Route::get('/', 'LoginController@index')
        ->middleware('admin.guest', 'preventBackHistory')
        ->name('login');
    Route::post('/login','LoginController@login')
        ->name('login.post');
    Route::post('/logout', 'LoginController@logout')
        ->name('logout');
});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => ['check.login.admin', 'preventBackHistory']

],function (){
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/list-brands', 'BrandController@index')->name('brand');
    Route::get('/brand/add-brand', 'BrandController@addBrand')->name('add.brand');
    Route::post('/brand/handle-add', 'BrandController@handleAddBrand')->name('handle.add.brand');
    Route::get('/brand/{slug}~{id}','BrandController@editBrand')->name('edit.brand');
    Route::post('/brand/update-brand','BrandController@handleUpdate')->name('update.brand');
    Route::post('brand/delete-brand', 'BrandController@deleteBrand')->name('delete.brand');
    Route::get('brand/search','BrandController@search')->name('search.brand');

    /*Product*/
    Route::get('/product','ProductController@index')->name('product.index');
    Route::get('/add-product', 'ProductController@create')->name('add.product');
    Route::post('/add-product', 'ProductController@store')->name('handle.add.product');
    Route::delete('/product/{product}', 'ProductController@destroy')->name('product.destroy');
    Route::get('/product/{product}', 'ProductController@edit')->name('product.edit');
    Route::post('/product/{product}', 'ProductController@update')->name('product.update');
    Route::post('/product/handle-edit/{id}', 'ProductController@handleEditproduct')
        ->name('handle.edit.product');


    /*Banner*/
    Route::group(['as' => 'banner.', 'prefix' => 'banner'], function () {
        Route::get('/','BannerController@index')->name('index');
        Route::get('/create','BannerController@create')->name('create');
        Route::post('/store','BannerController@store')->name('store');
        Route::get('/edit/{banner}','BannerController@edit')->name('edit');
        Route::post('/update/{banner}','BannerController@update')->name('update');
        Route::delete('/{banner}','BannerController@destroy')->name('destroy');
    });

    /*Category*/
    Route::group(['as' => 'category.', 'prefix' => 'category'], function () {
        Route::get('/category', 'CategoryController@index')->name('index');
        Route::get('/add-category', 'CategoryController@create')->name('create');
        Route::post('/add-category', 'CategoryController@store')->name('store');
        Route::get('/category/{slug}~{id}', 'CategoryController@edit')->name('edit');
        Route::post('/category/handle-edit', 'CategoryController@update')->name('update');
        Route::delete('/{category}', 'CategoryController@destroy')->name('destroy');
    });
    /*Shipping*/
    Route::get('/shipping','ShippingChargeController@index')->name('shipping_charge.index');
    Route::get('/shipping/create','ShippingChargeController@create')->name('shipping_charge.create');
    Route::post('/shipping/store','ShippingChargeController@store')->name('shipping_charge.store');
    Route::get('/shipping/edit/{shippingCharge}','ShippingChargeController@edit')
        ->name('shipping_charge.edit');
    Route::post('/shipping/update/{shippingCharge}','ShippingChargeController@update')
        ->name('shipping_charge.update');
    Route::delete('/shipping/{shippingCharge}','ShippingChargeController@destroy')
        ->name('shipping_charge.destroy');

    Route::get('/shipping/{slug}~{id}','ShippingController@editShipping')->name('edit.shipping');
    Route::post('/shipping/handle-edit/{id}','ShippingController@handleEditShipping')->name('handle.edit.shipping');
    Route::post('/shipping/delete-shipping','ShippingController@deleteShipping')->name('delete.shipping');

    /*Post*/
    Route::group(['as' => 'post.', 'prefix' => 'post'], function () {
        Route::get('/','PostController@index')->name('index');
        Route::get('/create','PostController@create')->name('create');
        Route::post('/store','PostController@store')->name('store');
        Route::get('/edit/{post}','PostController@edit')->name('edit');
        Route::post('/edit/{post}','PostController@update')->name('update');
        Route::delete('/{post}','PostController@destroy')->name('destroy');
    });

    /*Tags*/
    Route::group(['as' => 'tag.', 'prefix' => 'tag'], function () {
        Route::get('/','TagController@index')->name('index');
        Route::get('/create','TagController@create')->name('create');
        Route::post('/store','TagController@store')->name('store');
        Route::get('/edit/{tag}','TagController@edit')->name('edit');
        Route::post('/edit/{tag}','TagController@update')->name('update');
        Route::delete('/{tag}','TagController@destroy')->name('destroy');
        Route::post('/search','TagController@search')->name('search');
    });

    /*PostCategory*/
    Route::group(['as' => 'post_category.', 'prefix' => 'post-category'], function () {
        Route::get('/','PostCategoryController@index')->name('index');
        Route::get('/create','PostCategoryController@create')->name('create');
        Route::post('/store','PostCategoryController@store')->name('store');
        Route::get('/edit/{postCategory}','PostCategoryController@edit')->name('edit');
        Route::post('/edit/{postCategory}','PostCategoryController@update')->name('update');
        Route::delete('/{postCategory}','PostCategoryController@destroy')->name('destroy');
        Route::post('/search','PostCategoryController@search')->name('search');
    });
    /*Order*/
    Route::post('/order/{bill}','OrderController@update')->name('order.update');
    Route::get('/order','OrderController@getNewOrders')->name('order.new');
    Route::get('/order/delivery','OrderController@getDeliveryOrders')->name('order.delivery');
    Route::get('/order/done','OrderController@getDoneOrders')->name('order.done');
    Route::get('/add-order','OrderController@addOrder')->name('add.order');
    Route::post('/add-order','OrderController@handleOrder')->name('handle.add.order');
    Route::get('/order/{slug}~{id}','OrderController@editOrder')->name('edit.order');
    Route::post('/order/handle-edit/{id}','OrderController@handleEditOrder')->name('handle.edit.order');
    Route::get('/order/{bill}','OrderController@edit')->name('order.edit');

    /*Review*/
    Route::get('/review','ReviewController@index')->name('review');

    Route::get('/review/{slug}~{id}','ReviewController@editTag')->name('edit.review');
    Route::post('/review/handle-edit/{id}','ReviewController@handleEditTag')->name('handle.edit.review');
    Route::post('/review/delete-review','ReviewController@deleteTag')->name('delete.review');

    /*Coupon*/

    /*Users*/
    Route::get('/user','UserController@index')->name('users.index');
    Route::get('/add-users','UsersController@addUsers')->name('add.users');
    Route::post('/add-users','UsersController@handleUsers')->name('handle.add.users');
    Route::get('/users/{slug}~{id}','UsersController@editUsers')->name('edit.users');
    Route::post('/users/handle-edit/{id}','UsersController@handleEditUsers')->name('handle.edit.users');

    Route::group(['as' => 'statistic.'], function () {
        Route::get('/sale/{date?}', 'StatisticController@sale')->name('sale');
        Route::get('/revenue/{date?}', 'StatisticController@reportRevenue')->name('revenue');
    });
});
