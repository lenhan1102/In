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

Route::get('/admin', function () {
	return view('Admin.master');
});

Route::get('/', function () {
	return redirect()->route('index');
});
Route::get('/index', function () {
	$dishes = Dish::all();
	return Auth::check()? view('User.index') : view('index');
})->name('index');
//Admin
Route::group(['middleware' => ['roles', 'auth'], 'roles' => ['Admin']], function(){
	// Dish CRUD
	Route::get('/dish','Admin\DishController@index')->name('dish.index');
	Route::get('/dish/create','Admin\DishController@create')->name('dish.create');
	Route::post('/dish', 'Admin\DishController@store')->name('dish.store');
	Route::get('/dish/{id}', 'Admin\DishController@show')->name('dish.show');
	Route::get('/dish/{id}/edit','Admin\DishController@edit')->name('dish.edit');
	Route::put('/dish/{id}', 'Admin\DishController@update')->name('dish.update');
	Route::delete('/dish/{id}', 'Admin\DishController@destroy')->name('dish.destroy');

	// AJAX to update List and menu to edit
	Route::get('admin/AJAXList','Admin\DishController@AJAXList')->name('AJAXList');
	Route::get('admin/AJAXDish','Admin\DishController@AJAXDish')->name('AJAXDish');
	Route::get('admin/AJAXListEdit','Admin\DishController@AJAXListEdit')->name('AJAXListEdit');

	// Mlist CRUD
	Route::get('/mlist', 'Admin\MlistController@index')->name('mlist.index');
	Route::get('/mlist/create', 'Admin\MlistController@create')->name('mlist.create');
	Route::post('/mlist', 'Admin\MlistController@store')->name('mlist.store');
	Route::get('/mlist/{id}', 'Admin\MlistController@show')->name('mlist.show');
	Route::get('/mlist/{id}/edit', 'Admin\MlistController@edit')->name('mlist.edit');
	Route::put('/mlist/{id}', 'Admin\MlistController@update')->name('mlist.update');
	Route::delete('/mlist/{id}', 'Admin\MlistController@destroy')->name('mlist.destroy');

	// AJAX to update Mlist table
	Route::get('/AJAXMlist', 'Admin\UserController@index')->name('AJAXMlist_updatelist');
	//

	Route::get('/admin/user', 'Admin\UserController@index')->name('user.index');
	Route::get('/admin/user/{id}/edit','Admin\UserController@edit')->name('user.edit');
	Route::put('/admin/user', 'Admin\UserController@update')->name('user.update');
	Route::delete('/admin/user', 'Admin\UserController@destroy')->name('user.destroy');

	Route::get('/provider/order','Admin\OrderController@index')->name('order.index');
	Route::post('/provider/order','Admin\OrderController@setSuccess')->name('order.setSuccess');
	Route::delete('/provider/order/{id}', 'Admin\OrderController@destroy')->name('order.destroy');
});
Route::group(['middleware' => ['roles', 'auth'], 'roles' => ['User']], function(){
	
});
Route::group(['middleware' => ['roles', 'auth'], 'roles' => ['Admin', 'User']], function(){

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


Route::get('/test', function(){
	if(!Session::has('cart')) {
		$badge = 0;
	} else {
		$cart = Session::get('cart');
		$badge = 0;
		foreach (Dish::all() as $dish) {	
			$badge += $cart[$dish->id];
		}
	}
	return view('User.index', ['badge' => $badge]);
})->name('AJAXTest');

// Dish images: delete, set or unset avatar
Route::put('/image/{id}', 'Admin\ImageController@destroy')->name('image.destroy');
Route::get('/image/{id}', 'Admin\ImageController@set')->name('image.set');
Route::post('/image/{id}', 'Admin\ImageController@unset')->name('image.unset');
//	View
Route::get('/info/{id}', function($id){
	return view('User.dish_info',['dish' => Dish::find($id)]);
})->name('action.view');

Route::get('/add/{id}', 'User\ActionController@addToCart')->name('action.addToCart');
Route::get('/cart', 'User\ActionController@cart')->name('action.cart')->middleware('auth');
Route::get('/item/delete', 'User\ActionController@deleteItem')->name('item.delete');

Route::get('/search', 'User\ActionController@search')->name('search')->middleware('auth');
Route::post('/vote', 'User\ActionController@vote')->name('vote');

Route::post('/checkout', 'User\ActionController@postCheckout')->name('checkout');
Route::get('/checkout', 'User\ActionController@getCheckout')->name('checkout');

Route::get('/history', 'User\ActionController@getHistory')->name('history');

Route::get('/profile', 'User\ActionController@getProfile')->name('profile');
Route::post('/profile', 'User\ActionController@postProfile')->name('profile');

Route::get('/taikhoan', function () {
	return view('taikhoan');
});