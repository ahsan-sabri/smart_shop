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

//customers route
//
// Authentication Routes...
Route::get('/customer/login', 'Customer\LoginController@showLoginForm')->name('login');
Route::post('/customer/login', 'Customer\LoginController@login');
Route::post('/customer/logout', 'Customer\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('/customer/register', 'Customer\RegisterController@showRegistrationForm')->name('register');
Route::post('/customer/register', 'Customer\RegisterController@register');

// Password Reset Routes...
Route::get('/customer/password/reset', 'Customer\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/customer/password/email', 'Customer\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/customer/password/reset/{token}', 'Customer\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/customer/password/reset', 'Customer\ResetPasswordController@reset');

//front end route


Route::get('/', 'WelcomeController@index');

Route::get('/category-link/{id}', 'WelcomeController@category');

//Route::get('/category/women', 'WelcomeController@women');

Route::get('/contact', 'WelcomeController@contact');

Route::get('/details/{id}', 'WelcomeController@details');

Route::get('/cart/destroy', 'CartController@deleteAllCartContents');

//routes for cart

Route::get('/cart', 'WelcomeController@cart');

Route::post('/addToCart/', 'CartController@addToCart');

Route::get('/deleteFromCart/{id}', 'CartController@deleteCartContent');

Route::post('/cart/update', 'CartController@updateQuantity');

//routes for checkout 

Route::get('/checkout', 'CheckoutController@index');

Route::post('/checkout/signup', 'CheckoutController@customerRegistration');

Route::get('/checkout/shipping', 'CheckoutController@showShippingItem');


//admin routes

Route::get('/dashboard', 'HomeController@index');

Route::group(['middleware' => 'AuthenticateMiddleware'], function() {

    //admin category routes
//admin category create

    Route::get('/category/add', 'CategoryController@createCategory');
    Route::post('/category/save', 'CategoryController@saveCategory');

// admin category view

    Route::get('/category/manage', 'CategoryController@manageCategory');

//  admin category edit

    Route::get('/category/edit/{id}', 'CategoryController@editCategory');

//   admin category update
    Route::post('/category/update', 'CategoryController@updateCategory');

//  admin category delete

    Route::get('/category/delete/{id}', 'CategoryController@deleteCategory');

//    admin category slide create

    Route::post('/category/slide/add', 'CategoryController@saveCategorySlide');

//    admin category slide edit

    Route::get('/category/slide/edit/{id}', 'CategoryController@editCategorySlide');

    //   admin category slide update

    Route::post('/category/slide/update', 'CategoryController@updateCategorySlide');

//    admin category slide delete

    Route::get('/category/slide/delete/{id}', 'CategoryController@deleteCategorySlide');


//admin manufacturer routes
//admin manufacturer create

    Route::get('/manufacturer/add', 'ManufacturerController@createManufacturer');
    Route::post('/manufacturer/save', 'ManufacturerController@saveManufacturer');

// admin manufacturer view

    Route::get('/manufacturer/manage', 'ManufacturerController@manageManufacturer');

//  admin manufacturer edit

    Route::get('/manufacturer/edit/{id}', 'ManufacturerController@editManufacturer');

//   admin manufacturer update
    Route::post('/manufacturer/update', 'ManufacturerController@updateManufacturer');

//  admin manufacturer delete

    Route::get('/manufacturer/delete/{id}', 'ManufacturerController@deleteManufacturer');


//admin product routes
//admin product create

    Route::get('/product/add', 'ProductController@createProduct');
    Route::post('/product/save', 'ProductController@saveProduct');

// admin product view

    Route::get('/product/manage', 'ProductController@manageProduct');
    Route::get('/product/view/{id}', 'ProductController@viewProduct');

//  admin product edit

    Route::get('/product/edit/{id}', 'ProductController@editProduct');

//   admin product update
    Route::post('/product/update', 'ProductController@updateProduct');

//  admin product delete

    Route::get('/product/delete/{id}', 'ProductController@deleteProduct');

//    admin user routes
    // admin user view

    Route::get('/user/manage', 'UserController@manageUser');

//    general settings
    //logo uplaod

    Route::get('/logo', 'GeneralController@uploadLogo');

    //change logo

    Route::get('/logo/change/{id}', 'GeneralController@changeLogo');

    //update logo

    Route::post('/logo/update', 'GeneralController@updateLogo');
//    Route::post('/logo/upload', 'GeneralController@uploadNewLogo');    
    //slider uplaod

    Route::post('/slider/upload', 'GeneralController@uploadNewSlide');

    Route::get('/slider', 'GeneralController@showAllSlides');

    //change slider

    Route::get('/slider/change/{id}', 'GeneralController@changeSlide');

    //update slider

    Route::post('/slider/update', 'GeneralController@updateSlide');

    //delete slider

    Route::get('/slider/delete/{id}', 'GeneralController@deleteSlide');
});




