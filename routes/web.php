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

/*Form Entries*/
Route::get('/entries/{form_id}', 'FormEntriesController@index')->name('formentries.index');
Route::get('/entries/{form_id}/new', 'FormEntriesController@create')->name('formentries.create');
Route::post('/entries/{form_id}/new', 'FormEntriesController@store')->name('formentries.store');

Route::get('/entries/{form_id}/edit/{entry_id}', 'FormEntriesController@edit')->name('formentries.edit');
Route::put('/entries/{form_id}/edit/{entry_id}', 'FormEntriesController@update')->name('formentries.update');
Route::delete('/entries/{form_id}/delete/{entry_id}', 'FormEntriesController@delete')->name('formentries.delete');
