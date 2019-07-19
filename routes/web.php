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

Route::get('/', 'HomeController@index')->name('home');
//Route::get('/{anypath}', 'HomeController@index')->where('path', '.*');

//Category
Route::post('/add-category', 'CategoryController@add_category')->name('add.category');
Route::get('/category', 'CategoryController@all_category');
Route::get('/category/{id}', 'CategoryController@delete_category');
Route::get('/editcategory/{id}', 'CategoryController@edit_category');
Route::post('/updatecategory/{id}', 'CategoryController@update_category');
