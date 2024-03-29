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

Route::get('/', function(){
    return redirect('/home');
});

Route::controller('home', 'HomeController');

Route::resource('project',     'ProjectController');
Route::get('client/typeahead', 'ClientController@typeahead');
Route::resource('client',      'ClientController');
Route::resource('resource',    'ResourceController');