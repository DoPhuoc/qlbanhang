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


    /*Product*/
    Route::get('/product','ProductController@index')->name('list.product');
    Route::get('/add-product', 'ProductController@Addproduct')->name('add.product');
    Route::post('/add-product', 'ProductController@handleAddproduct')->name('handle.add.product');


    /*Banner*/
    Route::get('/banner','BannerController@index')->name('banner');
    Route::get('/add-banner','BannerController@addBanner')->name('add.banner');
    Route::post('/add-banner','BannerController@handleBanner')->name('handle.add.banner');
    Route::get('/banner/{slug}~{id}','BannerController@editBanner')->name('edit.banner');
    Route::post('/banner/handle-edit/{id}','BannerController@handleEditBanner')->name('handle.edit.banner');
    Route::post('/banner/delete-brand','BannerController@deleteBanner')->name('delete.banner');

    /*Category*/
    Route::get('/category','CategoryController@index')->name('category');
    Route::get('/add-category','CategoryController@addCategory')->name('add.category');
    Route::post('/add-category','CategoryController@handleCategory')->name('handle.add.category');
    Route::get('/category/{slug}~{id}','CategoryController@editCategory')->name('edit.category');
    Route::post('/category/handle-edit/{id}','CategoryController@handleEditCategory')->name('handle.edit.category');
    Route::post('/category/delete-category','CategoryController@deleteCaegory')->name('delete.category');

});
