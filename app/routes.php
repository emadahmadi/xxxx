<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::post('user/login', array('as'=>'user.login','uses'=>'UserController@login'));
Route::get('user/logout', array('as'=>'user.logout','uses'=>'UserController@logout'));
Route::get('tansaction/showAdmin', array('as'=>'transaction.showAdmin','uses'=>'TransactionController@showAdmin'));
Route::get('tansaction/search', array('as'=>'tansaction.search','uses'=>'TransactionController@search'));
Route::resource('user', 'UserController');
Route::resource('client', 'ClientController');
Route::resource('transaction', 'TransactionController');
Route::resource('/', 'UserController@index');
