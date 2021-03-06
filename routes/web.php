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
    return view('client');
});

Route::get('/test','TestConnectionController@testConnection');


Route::get('/admin','AdminController@welcome');

Route::get('getData','AdminController@getData');

Route::post('insertData','AdminController@insertData');

Route::post('deleteRow','AdminController@deleteRow');

Route::post('updateRow','AdminController@updateRow');

Route::post('getSelectedServices','IndexController@getSelectedData');

Auth::routes();


