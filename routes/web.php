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

	Route::group(['middleware' => 'auth'/*, 'where' => ['user' => '[0-9]+']*/], function () {	//use group in group for array parameter when having name() before group!

		//auth()->loginUsingId(13);

		Route::get('{user}', 'pageController@showUser')->name('show');
		Route::get('{user}/orders', 'pageController@showOrder')->name('orders');

		Route::get('{user}/addOrder', 'pageController@addForm')->name('addOrder');

		Route::post('{user}/orders', 'orderController@submit')->name('submitOrder');
	});
});

Route::name('order.')->prefix('orders')->group(function () {

	Route::group(['middleware' => 'auth'], function () {

		Route::get('{order}/edit', 'orderController@editForm')->name('edit');
		Route::patch('{order}', 'orderController@update')->name('update');
	});
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/administrator')->name('administrator')->middleware('admin');

Route::get('/{name}/profile', function (App\User $name)	//custome route binding -->> RouteServiceProvider
{
	return $name;
})->middleware('throttle:3,1');

Route::get('/profile', function ()
{
	return App\User::findOrFail(53)->name;
});

