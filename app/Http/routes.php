<?php
use App\Dish;
use App\Image;

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
	return redirect()->route('index');
});
Route::get('/index', function () {
	$dishes = Dish::all();
	//return Auth::check()? view('User.index') : view('index');
	return view('User.index');
})->name('index');


Route::group(['middleware' => ['roles'], 'roles' => ['Provider']], function(){
	Route::get('/dish','Provider\DishController@index')->name('dish.index');
	Route::get('/dish/create','Provider\DishController@create')->name('dish.create');
	Route::post('/dish', 'Provider\DishController@store')->name('dish.store');
	Route::get('/dish/{id}', 'Provider\DishController@show')->name('dish.show');
	Route::get('/dish/{id}/edit','Provider\DishController@edit')->name('dish.edit');
	Route::put('/dish/{id}', 'Provider\DishController@update')->name('dish.update');
	Route::delete('/dish/{id}', 'Provider\DishController@destroy')->name('dish.destroy');

	Route::get('/dish/{id}', 'Provider\DishController@getGallery')->name('dish.gallery');
	Route::get('/image/{id}/delete', 'Provider\ImageController@destroy')->name('image.destroy');
	Route::get('/image/{id}', 'Provider\ImageController@setAvatar')->name('image.set');
	Route::get('/image/{id}/unset', 'Provider\ImageController@unsetAvatar')->name('image.unset');
	// AJAX to update List and menu to edit
	Route::get('admin/AJAXList','Admin\DishController@AJAXList')->name('AJAXList');
	Route::get('admin/AJAXDish','Admin\DishController@AJAXDish')->name('AJAXDish');
	Route::get('admin/AJAXListEdit','Admin\DishController@AJAXListEdit')->name('AJAXListEdit');

	// AJAX to update Mlist table
	Route::get('/AJAXMlist', 'Admin\UserController@index')->name('AJAXMlist_updatelist');
	//
	Route::get('/menu', 'Provider\MenuController@index')->name('menu.index');
	Route::post('/menu/create', 'Provider\MenuController@create')->name('menu.create');
	Route::post('/menu', 'Provider\MenuController@store')->name('menu.store');
	Route::put('/menu/{id}', 'Provider\MenuController@update')->name('menu.update');
	Route::delete('/menu/{id}', 'Provider\MenuController@destroy')->name('menu.destroy');

	Route::get('/order','Provider\OrderController@index')->name('order.index');
	Route::get('/order/{id}','Provider\OrderController@edit')->name('order.edit');
	Route::delete('/order/{id}', 'Provider\OrderController@destroy')->name('order.destroy');

	
});

Route::group(['middleware' => ['roles'], 'roles' => ['Admin']], function(){
	Route::get('/admin/user', 'Admin\UserController@index')->name('user.index');
	Route::get('/admin/user/{id}/edit','Admin\UserController@edit')->name('user.edit');
	Route::put('/admin/user', 'Admin\UserController@update')->name('user.update');
	Route::delete('/admin/user', 'Admin\UserController@destroy')->name('user.destroy');
});

Route::group(['middleware' => ['roles'], 'roles' => ['User']], function(){
	
	Route::get('/info/{id}', function($id){
		return view('User.dish_info',['dish' => Dish::find($id)]);
	})->name('action.view');

	Route::get('/add/{id}', 'User\ActionController@addToCart')->name('action.addToCart');
	Route::get('/cart', 'User\ActionController@getCart')->name('action.cart')->middleware('auth');
	Route::get('/item/delete', 'User\ActionController@deleteItem')->name('item.delete');

	
	Route::post('/vote', 'User\ActionController@vote')->name('vote');

	Route::post('/checkout', 'User\ActionController@postCheckout')->name('checkout');
	Route::get('/checkout', 'User\ActionController@getCheckout')->name('checkout');

	Route::get('/history', 'User\ActionController@getOrderHistory')->name('history');

	Route::get('/profile', 'User\ActionController@getProfile')->name('profile');
	Route::post('/profile', 'User\ActionController@postProfile')->name('profile_post');
});
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin')->name('auth/login');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout')->name('auth/logout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister')->name('auth/register');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Facebook login...
Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider')->name('facebook');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');

Route::get('/search', 'User\ActionController@search')->name('search');

//	View
Route::get('/info/{id}', function($id){
	return view('User.dish_info',['dish' => Dish::find($id)]);
})->name('action.view');
