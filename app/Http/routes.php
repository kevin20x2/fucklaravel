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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('','FaqController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix' => 'admin','namespace' => 'Admin'],function()
{
	Route::get('/','AdminHomeController@index');
	Route::resource('books','BooksController');
});
Route::group(['prefix' => 'user','namespace' => 'User'],function()
{
	Route::get('/','UserHomeController@index');
	Route::resource('lends','LendsController');
	
});
