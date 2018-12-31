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
//Auth routes
Route::group(['namespace' => 'Auth'], function () {
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('register','RegisterController@showRegistrationForm')->name('register');
    Route::post('logout', 'LoginController@logout')->name('logout');

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

});
Route::get('/', 'HomeController@index')->name('home');

//Dashboard
Route::group(['middleware' => 'auth'], function(){

    Route::get('dashboard', 'HomeController@dashboard')->name('dashboard');
});


//Restaurant routes...
Route::group(['namespace' => 'Restaurants'], function(){
    //New restaurant account creating (super admin)..
    Route::post('restaurant/create', 'RegisterController@ajaxCreateTempAccount')->name('create.temp.restaurant');

    // Categories...
    Route::get('categories', 'CategoryController@getCategories')->name('categories');
    Route::post('store_category', 'CategoryController@store')->name('store.category');

});


//super admin route...

Route::group(['namespace' => 'SuperAdmin'], function(){
    Route::get('restaurants-list', 'SuperRestaurantController@getRestaurants')->name('restaurants.list');
    Route::get('restaurants/pending-list', 'SuperRestaurantController@getPendingRestaurants')->name('restaurants.pending.list');
});
