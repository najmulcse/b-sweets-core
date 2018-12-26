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
    Route::post('logout', 'LoginController@logout')->name('logout');

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

});
Route::get('/', 'HomeController@index')->name('home');

//Dashboard
Route::get('dashboard', 'HomeController@dashboard')->name('dashboard');


//Restaurant
Route::group(['namespace' => 'Restaurants'], function(){
    Route::get('categories', 'CategoryController@getCategories')->name('categories');
    Route::post('store_category', 'CategoryController@store')->name('store.category');

});


//super admin

Route::group(['namespace' => 'SuperAdmin'], function(){
    Route::get('restaurants-list', 'SuperRestaurantController@getRestaurants')->name('restaurants.list');
});

