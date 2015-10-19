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

Route::get('login',[
'middleware' => 'guest', 'as' => 'login', 'uses' => 'loginController@loginGet'
]);
Route::post('login',[
'middleware' => 'guest', 'uses' => 'loginController@loginPost'
]);

Route::get('logout', [
'middleware' => 'auth' ,'as' => 'logout','uses' => 'loginController@logout'
]);

Route::get('user/home',[
	'as' => 'user_home', 'uses' => 'User\UserController@home'
]);
Route::get('user/edit',[
	'as' => 'user_edit' ,'uses'  => 'User\UserController@edit'
]);
Route::post('user/update',[
	'as' => 'user_update', 'uses' => 'User\UserController@update'
]);
Route::resource('admin/books', 'Admin\BooksController');
Route::resource('admin/lends', 'Admin\LendsController');
Route::resource('admin/return', 'Admin\ReturnController',
	['only' => ['index', 'store']]);
//Route::get('admin/return', 'Admin\ReturnController@index');
Route::get('faq','FaqController@index');

Route::get('books/{id}', 'Admin\BooksController@show');

Route::get('admin/books/create',[
	'as' => 'book_create','uses' => 'Admin\BooksController@create'
]);

Route::get('user/reserve',[
	'as' => 'user_reserve' ,'uses' => 'User\ReserveController@work'
]);

Route::resource('admin','Admin\AdminController');
