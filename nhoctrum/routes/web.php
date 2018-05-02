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
Auth::routes();

Route::get('admin/login','AdminController@getLogin');
Route::post('admin/login','AdminController@postLogin');
Route::get('logout','AdminController@getLogout');

Route::get('/', 'HomeController@index');

Route::get('shop', 'HomeController@product');

Route::get('sanpham/{id}', 'HomeController@productDetail');

Route::prefix('search')->group(function () {
	Route::get('/', 'HomeController@search');
	Route::get('tag/{id}', 'HomeController@searchByTag');
	Route::get('filter', 'HomeController@advancedSearch');
});

Route::group(['middleware' => ['auth']], function () {

	Route::prefix('admin')->group(function () {
	    Route::resource('product', 'ProductController');
	    Route::resource('tag', 'TagController', ['except' => ['show']]);
	    Route::resource('category', 'CategoryController', ['except' => ['show']]);
	    Route::resource('size', 'SizeController', ['except' => ['show']]);
	    Route::resource('banner', 'BannerController', ['except' => ['show']]);
	    // Route::resource('size', 'SizeController', ['only' => ['']]);
	});
});

Route::get('controller/{var1}/{var2}', 'TestController@method');

Route::get('view/{var1}/{var2}', 'TestController@getView');

// Route::group(['middleware' => ['web']], function () {
// 	// Authentication Routes
// 	Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);
// 	Route::post('auth/login', 'Auth\LoginController@postLogin');
// 	Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@getLogout']);

// 	// Registration Routes
// 	Route::get('auth/register', 'Auth\RegisterController@getRegister');
// 	Route::post('auth/register', 'Auth\RegisterController@postRegister');

// });



