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

Route::get('/', 'ThreadController@index');

Route::post('/threads', 'ThreadController@store');

Route::get('/threads/create', 'ThreadController@create');

Route::get('/threads/{thread}/edit', 'ThreadController@edit');

Route::get('/threads/{thread}', 'ThreadController@show');

Route::delete('/threads/{thread}', 'ThreadController@destroy');

Route::patch('/threads/{thread}', 'ThreadController@update');


Route::post('/threads/{thread}/posts', 'PostController@store');

Route::get('/posts/{post}', 'PostController@edit');

Route::delete('/posts/{post}', 'PostController@destroy');

Route::patch('/posts/{post}', 'PostController@update');

Route::get('/users/{user}', 'UserController@show');

Route::get('/my-threads', 'UserThreadController@index');


Route::get('/settings', function () {
    return view('settings.settings');
})->middleware('auth');

Route::post('/change-password', 'ChangePasswordController@update');

Route::post('/change-email', 'ChangeEmailController@update');

Route::post('/change-profile-picture', 'ProfilePictureController@update');


Route::get('/threads-with-tags', 'SearchByTag@show');

Auth::routes();
