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

Route::get('/', function()
{
	return View::make('hello');
});  
Route::get('index','FormController@showWelcome');

Route::get('getRecent','FormController@getRecent');
Route::get('login', function()
{
     #return $id;
     return View::make('loginForm');
    
});

Route::get('admin', array('before' => 'auth', function()
{
    return View::make('adminPage');
}));

Route::post('login','FormController@userLogin'); 
Route::get('/users/most/followers/{id}','FormController@getFollowers');
Route::get('/comments/{id}/{num}','FormController@getComments');
Route::get('logout','FormController@logout');

