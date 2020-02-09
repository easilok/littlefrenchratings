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

	Route::get('user/register', 'UserController@create');

	Route::post('user/register', 'UserController@store');

	Route::get('user/password', 'UserController@password');

	Route::patch('user/password', 'UserController@changePassword');

	Route::get('/users', 'UserController@index');

	Route::get('/users/{id}/edit', 'UserController@edit');

	Route::patch('/users/{id}', 'UserController@update');

	Route::get('logout', function() {
		Auth::logout();
		return redirect('/');
	});

});
