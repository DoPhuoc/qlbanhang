<?php
Route::group([
    'namespace' => 'Admin',
    'prefix' => 'admin',
    'as' => 'admin.'
],function (){
    Route::get('/', 'LoginController@index')
        //->middleware('is.logined.admin')
        ->name('login');
    Route::post('/login','LoginController@login')->name('login.post');
    Route::post('/logout', 'LoginController@logout')->name('logout');
});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => ['web','check.login.admin']

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
    Route::get('/product','ProductController@index')->name('list.product');
    Route::get('/add-product', 'ProductController@create')->name('add.product');
    Route::post('/add-product', 'ProductController@store')->name('handle.add.product');
    Route::get('/product/{slug}~{id}', 'ProductController@Editproduct')->name('edit.product');
    Route::post('/product/handle-edit/{id}', 'ProductController@handleEditproduct')->name('handle.edit.product');
//    Route::post('brand/delete-brand', 'BrandController@deleteBrand')->name('delete.brand');

    /*Banner*/
    Route::get('/banner','BannerController@index')->name('banner');
    Route::get('/add-banner','BannerController@addBanner')->name('add.banner');
    Route::post('/add-banner','BannerController@handleBanner')->name('handle.add.banner');
    Route::get('/banner/{slug}~{id}','BannerController@editBanner')->name('edit.banner');
    Route::post('/banner/handle-edit/{id}','BannerController@handleEditBanner')->name('handle.edit.banner');
    Route::get('/banner/delete-banner/{id}','BannerController@deleteBanner')->name('delete.banner');

    /*Category*/
    Route::get('/category','CategoryController@index')->name('category');
    Route::get('/add-category','CategoryController@addCategory')->name('add.category');
    Route::post('/add-category','CategoryController@handleCategory')->name('handle.add.category');
    Route::get('/category/{slug}~{id}','CategoryController@editCategory')->name('edit.category');
    Route::post('/category/handle-edit','CategoryController@handleEditCategory')->name('handle.edit.category');
    Route::get('/category/delete-category/{id}','CategoryController@deleteCategory')->name('delete.category');
    Route::get('/category/search','CategoryController@search')->name('search.category');
    /*Shipping*/
    Route::get('/shipping','ShippingController@index')->name('shipping');
    Route::get('/add-shipping','ShippingController@addShipping')->name('add.shipping');
    Route::post('/add-shipping','ShippingController@postaddShipping')->name('handle.add.shipping');
    Route::get('/shipping/{id}','ShippingController@editShipping')->name('edit.shipping');
    Route::post('/shipping/handle-edit/{id}','ShippingController@postEditShipping')->name('handle.edit.shipping');
    Route::get('/shipping/delete-shipping/{id}','ShippingController@deleteShipping')->name('delete.shipping');
    Route::get('/shipping/search','ShippingController@searchShipping')->name('search.shippings');

    /*Post*/
    Route::get('/post','PostController@index')->name('post');
    Route::get('/add-post','PostController@getaddPosts')->name('add.post');
    Route::post('/add-post','PostController@handlePosts')->name('handle.add.post');
    Route::get('/post/{slug}~{id}','PostController@geteditPosts')->name('edit.post');
    Route::post('/post/handle-edit/{id}','PostController@postEditPosts')->name('handle.edit.post');
    Route::get('/post/delete-post/{id}','PostController@deletePost')->name('delete.post');
    Route::get('/post/search','PostController@search')->name('search.post');
    /*Tags*/
    Route::get('/tag','TagController@index')->name('tag');
    Route::get('/add-tag','TagController@getaddTag')->name('add.tag');
    Route::post('/add-tag','TagController@postaddTag')->name('handle.add.tag');
    Route::get('/tag/{slug}~{id}','TagController@geteditTag')->name('edit.tag');
    Route::post('/tag/handle-edit/{id}','TagController@posteditTag')->name('handle.edit.tag');
    Route::get('/tag/delete-post/{id}','TagController@deleteTag')->name('delete.tag');
    Route::get('/tag/search','TagController@search')->name('search.tag');
    /*PostCategory*/
    Route::get('/postCategory','PostCategoryController@index')->name('postCategory');
    Route::get('/add-postCategory','PostCategoryController@getaddPostCategory')->name('add.postCategory');
    Route::post('/add-postCategory','PostCategoryController@postaddPostCategory')->name('handle.add.postCategory');
    Route::get('/postCategory/{slug}~{id}','PostCategoryController@geteditPostCategory')->name('edit.postCategory');
    Route::post('/postCategory/handle-edit/{id}','PostCategoryController@posteditPostCategory')->name('handle.edit.postCategory');
    Route::get('/postCategory/delete-post/{id}','PostCategoryController@deletePostCategory')->name('delete.postCategory');
    Route::get('/postCategory/search','PostCategoryController@search')->name('search.postCategory');
    /*Order*/
    Route::get('/order','OrderController@index')->name('order');
    Route::get('/add-order','OrderController@addOrder')->name('add.order');
    Route::post('/add-order','OrderController@handleOrder')->name('handle.add.order');
    Route::get('/order/{slug}~{id}','OrderController@editOrder')->name('edit.order');
    Route::post('/order/handle-edit/{id}','OrderController@handleEditOrder')->name('handle.edit.order');

    /*Review*/
    Route::get('/review','ReviewController@index')->name('review');

    Route::get('/review/{slug}~{id}','ReviewController@editTag')->name('edit.review');
    Route::post('/review/handle-edit/{id}','ReviewController@handleEditTag')->name('handle.edit.review');
    Route::post('/review/delete-review','ReviewController@deleteTag')->name('delete.review');

    /*Coupon*/
    Route::get('/coupon','CouponController@index')->name('coupon');
    Route::get('/add-coupon','CouponController@addCoupon')->name('add.coupon');
    Route::post('/add-coupon','CouponController@postaddCoupon')->name('handle.add.coupon');
    Route::get('/coupon/{id}','CouponController@geteditCoupon')->name('edit.coupon');
    Route::post('/coupon/handle-edit/{id}','CouponController@posteditCoupon')->name('handle.edit.coupon');
    Route::get('/coupon/delete-coupon/{id}','CouponController@deleteCoupon')->name('delete.coupon');
    /*Users*/
    Route::get('C','UsersController@index')->name('users');
    Route::get('/add-users','UsersController@addUsers')->name('add.users');
    Route::post('/add-users','UsersController@handleUsers')->name('handle.add.users');
    Route::get('/users/{slug}~{id}','UsersController@editUsers')->name('edit.users');
    Route::post('/users/handle-edit/{id}','UsersController@handleEditUsers')->name('handle.edit.users');
});
