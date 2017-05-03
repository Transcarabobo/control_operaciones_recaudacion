<?php

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

Route::get('/', ['middleware' => 'auth', function () {
    return view('welcome');
}]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

	Route::resource('users', 'UsersController');
	Route::get('users/{id}/destroy', [
		'uses' => 'UsersController@destroy',
		'as'   => 'admin.users.destroy'
	]);

	Route::resource('operators', 'OperatorsController');
	Route::get('operators/{id}/destroy', [
		'uses' => 'OperatorsController@destroy',
		'as'   => 'admin.operators.destroy'
	]);

	Route::resource('vehicles', 'VehiclesController');
	Route::get('vehicles/{id}/destroy', [
		'uses' => 'VehiclesController@destroy',
		'as'   => 'admin.vehicles.destroy'
	]);

	Route::resource('routes', 'RoutesController');
	Route::get('routes/{id}/destroy', [
		'uses' => 'RoutesController@destroy',
		'as'   => 'admin.routes.destroy'
	]);
	
});

// Authentication routes...
Route::get('admin/auth/login', [
	'uses' 	=> 'Auth\AuthController@getLogin',
	'as'	=> 'admin.auth.login'
]);
Route::post('admin/auth/login', [
	'uses' 	=> 'Auth\AuthController@postLogin',
	'as'	=> 'admin.auth.login'
]);
Route::get('admin/auth/logout', [
	'uses' 	=> 'Auth\AuthController@getLogout',
	'as'	=> 'admin.auth.logout'
]);