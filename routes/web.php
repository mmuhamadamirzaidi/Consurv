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

Route::get('/', function () {
	return redirect()->route('login');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController');
	Route::put('user/{user}/password', 'UserController@password')->name('user.password');
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

	Route::resource('company', 'CompanyController');
	Route::resource('health-information', 'HealthInformationController');
	Route::resource('rig', 'RigController');
	Route::group([
		'prefix' => 'statistic', 'as' => 'statistic.'
	], function () {
		Route::get('risk-level', 'StatisticController@riskLevel')->name('risk-level');	
	});
	
});

