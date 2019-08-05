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

Route::get('/', 'pageController@welcome');

Route::get('about', 'pageController@about');

Route::name('user.')->prefix('users')->group(function () {

	Route::get('{user}', 'pageController@showUser')->name('show');
	Route::get('{user}/orders', 'pageController@showOrder')->name('orders');

	Route::get('{user}/addOrder', 'pageController@addForm')->name('addOrder');

	Route::post('{user}/orders', 'orderController@submit')->name('submitOrder');

});

Route:name('order.')->prefix('orders')->group(function () {
	
	Route::get('{order}/edit', 'orderController@editForm')->name('edit');
	Route::patch('{order}', 'orderController@update')->name('update');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/administrator')->name('administrator')->middleware('admin');
