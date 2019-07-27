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

Route::get('users/{user}', 'pageController@showUser');
Route::get('users/{user}/orders', 'pageController@showOrder');

Route::get('users/{user}/addOrder', 'pageController@addForm');

Route::post('users/{user}/orders', 'orderController@submit');

Route::get('orders/{order}/edit', 'orderController@editForm');
Route::patch('orders/{order}', 'orderController@update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/administrator')->name('administrator')->middleware('admin');
