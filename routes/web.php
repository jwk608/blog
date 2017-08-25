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
//Authentication Routes
Auth::routes();
Route::get('auth/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('auth/login', 'Auth\LoginController@login');
Route::get('auth/logout','Auth\LoginController@logout')->name('logout');
//Registration Routes

Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('auth/register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//Categories
//resource gives all CRUD routes
Route::resource('categories', 'CategoryController',['except' => ['create']]);

//Tags
Route::resource('tags', 'TagController',['except' => ['create']]);

//Comments
Route::post('comments/{post_id}', ['uses' =>'CommentsController@store', 'as' => 'comments.store']);
Route::get('comments/{id}/edit', ['uses' => 'CommentsController@edit','as' => 'comments.edit']);
Route::put('comments/{id}', ['uses' => 'CommentsController@update','as' => 'comments.update']);
Route::delete('comments/{id}', ['uses' => 'CommentsController@destroy','as' => 'comments.destroy']);
Route::get('comments/{id}/delete', ['uses' => 'CommentsController@delete','as' => 'comments.delete']);





Route::get('blog/{slug}', ['as'=> 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');

Route::get('blog',['uses' => 'BlogController@getIndex', 'as'=>'blog.index']);

Route::get('/', 'PagesController@getIndex');

Route::get('/about', 'PagesController@getAbout');

Route::get('/contact', 'PagesController@getContact');
Route::post('/contact', 'PagesController@postContact');

Route::resource('posts', 'PostController');

 