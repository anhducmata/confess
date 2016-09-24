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

/*Status*/
Route::post('/home/action/status/create', [
	'uses' => 'HomeController@postCreate',
	'as'   => 'post.status.create'
	]);
Route::post('/home/action/status/privacy', [
	'uses' => 'HomeController@postPrivacyChange',
	'as'   => 'post.status.privacy'
	]);
Route::post('/home/action/status/delete', [
	'uses' => 'HomeController@postDelete',
	'as'   => 'post.status.delete'
	]);
Route::post('/home/action/status/like',[
	'uses' => 'StatusController@postLike',
	'as'   => 'post.status.like'
]);

/*Comment*/
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