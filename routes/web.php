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
    return view('auth.login');
}); 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//insert depart
Route::get('insert','DepartController@insertform');
Route::post('create','DepartController@insert');  


//auto complete
// Route::get('autocomplete', 'AutocompleteController@index');
Route::post('autocomplete/fetch', 'AutocompleteController@fetch')->name('autocomplete.fetch');
// Route::post('autocomplete/create','AutocompleteController@insert');  