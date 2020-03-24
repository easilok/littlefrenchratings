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


Auth::routes(['register' => false]);

Route::get('/', function () {
    return redirect('home');
});

Route::group (['middleware' => 'auth'], function() {
	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/establishment', 'EstablishmentController@index');

	Route::get('/establishment/create', 'EstablishmentController@create');

	Route::get('/establishment/{establishment}', 'EstablishmentController@show');

	Route::get('/establishment/{establishment}/edit', 'EstablishmentController@edit');

	Route::get('/establishment/{establishment}/plate/create', 'EstablishmentController@create_plate');

	Route::post('/establishment/{establishment}/plate', 'EstablishmentController@store_plate');

	Route::post('/establishment', 'EstablishmentController@store');

	Route::patch('/establishment/{establishment}', 'EstablishmentController@update');

	Route::get('/plate', 'PlateController@index');

	Route::get('/plate/create', 'PlateController@create');

	Route::get('/plate/{plate}', 'PlateController@show');

	Route::get('/plate/{plate}/taste/create', 'PlateController@create_taste');

	Route::post('/plate/{plate}/taste', 'PlateController@store_taste');

	Route::get('/plate/{plate}/edit', 'PlateController@edit');

	Route::post('/plate', 'PlateController@store');

	Route::patch('/plate/{plate}', 'PlateController@update');

	Route::get('/my-tastes/', 'TasteController@index');

	Route::get('/taste/', 'TasteController@index');

	Route::get('/taste/{taste}/edit', 'TasteController@edit');

	Route::get('/taste/{taste}/rating/create', 'TasteController@create_rating');

	Route::post('/taste/{taste}/rating', 'TasteController@store_rating');

	Route::patch('/taste/{taste}', 'TasteController@update');

	Route::delete('/taste/{taste}', 'TasteController@destroy');

	Route::get('user/register', 'UserController@create');

	Route::post('user/register', 'UserController@store');

	Route::get('user/password', 'UserController@password');

	Route::patch('user/password', 'UserController@changePassword');

	Route::get('/users', 'UserController@index');

	Route::get('/users/{user}/edit', 'UserController@edit');

	Route::patch('/users/{user}', 'UserController@update');

	Route::get('logout', function() {
		Auth::logout();
		return redirect('/');
	});

});
