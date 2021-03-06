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

Route::get('/', ['as' => 'welcome', 'middleware' => 'auth', function () {
    return view('welcome');
}]);

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

	Route::group(['middleware' => 'roleshinobi:administrator'], function(){
		Route::resource('permissions', 'PermissionsController');
		Route::get('permissions/{id}/destroy', [
			'uses' => 'PermissionsController@destroy',
			'as'   => 'admin.permissions.destroy'
		]);

		Route::resource('roles', 'RolesController');
		Route::get('roles/{id}/destroy', [
			'uses' => 'RolesController@destroy',
			'as'   => 'admin.roles.destroy'
		]);

		Route::resource('users', 'UsersController');
		Route::get('users/{id}/destroy', [
			'uses' => 'UsersController@destroy',
			'as'   => 'admin.users.destroy'
		]);

		Route::get('operators/{id}/destroy', [
			'uses' => 'OperatorsController@destroy',
			'as'   => 'admin.operators.destroy'
		]);

		Route::get('vehicles/{id}/destroy', [
			'uses' => 'VehiclesController@destroy',
			'as'   => 'admin.vehicles.destroy'
		]);

		Route::get('routes/{id}/destroy', [
			'uses' => 'RoutesController@destroy',
			'as'   => 'admin.routes.destroy'
		]);

		Route::get('despatches/{id}/destroy', [
			'uses' => 'DespatchesController@destroy',
			'as'   => 'admin.despatches.destroy'
		]);
	});

	Route::group(['middleware' => 'roleshinobi:operations'], function(){
		Route::resource('operators', 'OperatorsController');

		Route::resource('vehicles', 'VehiclesController');
		Route::get('vehicles/{id}/status', [
			'uses' => 'VehiclesController@status',
			'as'   => 'admin.vehicles.status'
		]);

		Route::resource('routes', 'RoutesController');

		Route::get('despatches/create', [
			'uses' => 'DespatchesController@create',
			'as'   => 'admin.despatches.create'
		]);
		Route::put('despatches/{despatches}', [
			'uses' => 'DespatchesController@update',
			'as'   => 'admin.despatches.update'
		]);
		Route::get('despatches/{despatches}/edit', [
			'uses' => 'DespatchesController@edit',
			'as'   => 'admin.despatches.edit'
		]);
		Route::post('despatches', [
			'uses' => 'DespatchesController@store',
			'as'   => 'admin.despatches.store'
		]);
	});

	Route::get('despatches', [
		'uses' => 'DespatchesController@index',
		'as'   => 'admin.despatches.index'
	])->middleware('permissionshinobi:read-despatch');

	Route::get('user/password', [
			'uses' => 'UsersController@password',
			'as'   => 'admin.users.password'
	]);
	Route::post('user/password', [
			'uses' => 'UsersController@updatePassword',
			'as'   => 'admin.users.password'
	]);

	Route::get('collections/{id}/create', [
		'uses' => 'CollectionsController@create',
		'as'   => 'admin.collections.create'
	])->middleware('permissionshinobi:create-collection');

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

// Reset Password...
Route::get('user/password/email', 'Auth\PasswordController@getEmail');
Route::post('user/password/email', [
	'uses' 	=> 'Auth\PasswordController@postEmail',
	'as'	=> 'user.password.email'
]);
Route::get('user/password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('user/password/reset', [
	'uses' 	=> 'Auth\PasswordController@postReset',
	'as'	=> 'user.password.reset'
]);
