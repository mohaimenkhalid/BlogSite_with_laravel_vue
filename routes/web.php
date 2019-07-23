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
    return view('public.index');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');
//Route::get('/{anypath}', 'HomeController@index')->where('path', '.*');


Route::group(['middleware' => ['auth']], function () {
		    
		  //Category
		Route::post('/add-category', 'CategoryController@add_category')->name('add.category');
		Route::get('/category', 'CategoryController@all_category');
		Route::get('/category/{id}', 'CategoryController@delete_category');
		Route::get('/editcategory/{id}', 'CategoryController@edit_category');
		Route::post('/updatecategory/{id}', 'CategoryController@update_category');

		//post

		Route::get('/post', 'PostController@all_post');
		Route::post('/savepost', 'PostController@savepost');
		Route::get('/deletepost/{id}', 'PostController@delete_post');
		Route::get('/editpost/{id}', 'PostController@edit_post');
		Route::post('/updatepost/{id}', 'PostController@update_post');

});


		//blog..

		Route::get('/blogpost', 'BlogController@get_all_blog_post');
		Route::get('/singlepost/{id}', 'BlogController@get_post_by_id');
		Route::get('/categories', 'BlogController@categories');
		Route::get('/categorypost/{id}', 'BlogController@categorypost');
		Route::get('/search', 'BlogController@searchpost');