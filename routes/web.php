<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/user/{id}', 'UserController@index');

Route::get('/home', [
	'uses' => 'HomeController@index',
	'as'   => 'home'
	]);
Route::post('/home/action/poststatus', [
	'uses' => 'HomeController@postStatus',
	'as'   => 'post.status'
	]);
Route::post('/home/action/postprivacychange', [
	'uses' => 'HomeController@postPrivacyChange',
	'as'   => 'post.privacy'
	]);
Route::post('/home/action/postdelete', [
	'uses' => 'HomeController@postDelete',
	'as'   => 'post.delete'
	]);
Route::post('/home/action/comment/create', [
	'uses' => 'CommentController@create',
	'as'   => 'post.comment.create'
	]);
Route::post('/home/action/comment/delete', [
	'uses' => 'CommentController@delete',
	'as'   => 'post.comment.delete'
	]);
Route::post('/home/action/comment/like', [
	'uses' => 'CommentController@like',
	'as'   => 'post.comment.like'
	]);
Route::post('/home/action/comment/unlike', [
	'uses' => 'CommentController@unlike',
	'as'   => 'post.comment.unlike'
	]);

Route::get('/', function () {
	if (Auth::check()){
		return Redirect::action('HomeController@index');

	}
	else {
    	return view('welcome');
	}
});

Auth::routes();