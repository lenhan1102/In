<?php
use App\Dish;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
//Admin

// Home
Route::get('/index', function () {
	$dishes =  Dish::all();
	foreach ($dishes as $dish) {
		# code...
		$dish->o = 'hello';
	}
    return view('index', ['dishes' => $dishes]);
});

//
Route::get('/account', function(){
	return view('taikhoan');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');

Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Facebook login...
Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');

Route::post('admin/storeDish', 'Admin\DishController@store');
Route::get('admin/createDish','Admin\DishController@create');


Route::get('admin/indexDish','Admin\DishController@index')->name('indexDish');

Route::get('admin/AJAXList','Admin\DishController@AJAXList');
Route::get('admin/AJAXDish','Admin\DishController@AJAXDish');

Route::get('admin/editDish/{id}','Admin\DishController@edit');

