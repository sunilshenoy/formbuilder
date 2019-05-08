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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'FormBuilderController@index')->name('home');

/*Form Builder*/
Route::get('/create', 'FormBuilderController@create')->name('formbuilder.create');
Route::post('/create', 'FormBuilderController@store')->name('formbuilder.store');
