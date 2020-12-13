<?php

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



Route::prefix('/admin')->middleware(['multilang'])->group(function (){

    Route::get('/login','AdminAuthController@login')->name('admin.login');
    Route::post('/auth','AdminAuthController@authenticate')->name('admin.auth');
    Route::get('/lang/{lang}',function (\Illuminate\Http\Request $request,$lang){

        auth()->user()->lang=$lang;
        auth()->user()->save();
        return redirect()->back();

    })->name('change-language');
    Route::get('/logout',function (){
       auth()->logout();
       return redirect()->route('admin.login');
    })->name('admin.logout');

    Route::namespace('Admin')->group(function(){
        //categories
        Route::resource('/categories','CategoryController');

        Route::get('/categories/{id}/delete','CategoryController@destroy')
            ->name('categories.delete');
        // manufactoires
        Route::resource('/manufactories','ManufactoryController');
        Route::get('/manufactories/{id}/delete','ManufactoryController@destroy')
            ->name('manufactories.delete');
        //products
        Route::resource('/products','ProductController');
        Route::get('/products/{id}/delete','ProductController@destroy')->name('products.delete');
        //Accounts
        Route::get('/accounts/profile','AccountController@profile')->name('accounts.profile');
        Route::resource('/accounts','AccountController');
        Route::get('/accounts/{id}/delete','AccountController@destroy')->name('accounts.delete');
        Route::put('/accounts/profile/change-password','AccountController@changePasssword')->name('accounts.profile.change-password');
        Route::put('/accounts/profile/update','AccountController@updateProfile')->name('accounts.profile.update');
        Route::put('/accounts/profile/logo/update','AccountController@updateLogo')->name('accounts.profile.logo.update');

        //permissions
        Route::get('/accounts/{id}/permissions/','AccountController@permissions')->name('accounts.permissions');
        Route::post('/accounts/{id}/permissions/update','AccountController@updatePermissions')->name('accounts.permissions.update');
        //content management
        Route::get('/content-management/slider','ContentManagementController@slider')->name('content-management.slider');
        Route::post('/content-management/slider/update','ContentManagementController@updateSlider')->name('content-management.slider.update');

    });

});

Route::namespace('Customer')->group(function (){

    Route::get('/','CustomerController@home')->name('customer.home');
    Route::get('/categories/{id}','CustomerController@categories')
        ->name('customer.categories.show');
    Route::get('/categories/{id}/sub-categories','CustomerController@subcategories')
        ->name('customer.subcategories.index');
    Route::get('/products','CustomerController@products')
        ->name('customer.products.show');
    Route::get('/products/search','CustomerController@searchForProduct')
        ->name('customer.products.search');
    Route::get('products/{id}','CustomerController@productInfo')
        ->name('customer.products.info');
    Route::get('customer-register','CustomerController@register')
        ->name('customer.register');
});


/*Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');*/

//Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
