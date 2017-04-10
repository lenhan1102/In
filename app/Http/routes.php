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
	if (Auth::check()){
		return view('index');
	} else {
		return view('user_index', ['dishes' => $dishes]);
	}
})->name('index');
//Admin

// Home
Route::get('/aaaa', function () {
	$dishes =  Dish::all();
	//dd(count($dishes));
	/*foreach ($dishes as $dish) {
		# code...
		//dd($dish);
		// Get first image to show
		if(Image::where('dish_id', $dish->id)->first()){
			$link = Image::where('dish_id', $dish->id)->first()->link;
			$dish->link = $link;
		} else{
			$dish->link = 'hello';
		}	
	}*/
	return view('index');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin')->name('auth/login');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout')->name('auth/logout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Facebook login...
Route::get('auth/facebook', 'Auth\AuthController@redirectToProvider')->name('facebook');
Route::get('auth/facebook/callback', 'Auth\AuthController@handleProviderCallback');

// Dish CRUD
Route::get('/dish','Admin\DishController@index')->name('dish.index');
Route::get('dish/create','Admin\DishController@create')->name('dish.create');
Route::post('dish', 'Admin\DishController@store')->name('dish.store');
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
Route::get('/AJAXMlist', 'Admin\MlistController@AJAXMlist')->name('AJAXMlist_updatelist');

//
Route::get('/test', function(){
	return view('testSlider');
});
Route::put('/image/{id}', 'Admin\ImageController@destroy')->name('image.destroy');