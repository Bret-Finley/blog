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

Route::get('/', 'APIController@getBlogs');

Route::get('/login', function () {
	return view('login');
});

Route::get('/logout', 'UserController@logout');

Route::get('/register', function () {
	return view('register');
});

Route::get('/account', 'UserController@account');

Route::get('/newpost', function () {
    return view('newpost');
});

Route::get('/view-post/{id}', 'APIController@getBlogPost');

Route::get('/view-blog/{id}', 'APIController@getBlog');

Route::get('/about', function () {
	return view('about');
});


Route::post('/login', 'UserController@login');

Route::post('/register', 'UserController@register');

Route::post('/account', 'UserController@editaccount');

Route::post('/newpost', 'BlogController@create');

Route::post('/view-post/{id}', 'BlogController@saveComment');
