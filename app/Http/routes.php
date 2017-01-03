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
//
// Route::get('/', function () {
//     return view('pages.home');
// });


Route::get('/', ['as' => 'most-viewed', 'uses' => 'CalloutController@index']);
Route::get('callout/{id}', ['as' => 'callout',   'uses' => 'CalloutController@details']);
Route::get('votes', ['as' => 'votes',   'uses' => 'VoteController@vote']);
Route::get('login', ['as' => 'login', 'uses' => 'CalloutController@login']);
Route::get('logout', ['as' => 'logout', 'uses' => 'CalloutController@logout']);
Route::get('comments', ['as' => 'comments', 'uses' => 'CalloutController@comments']);
Route::get('add-comment', ['as' => 'comments', 'uses' => 'CalloutController@addComment']);
Route::get('forgot-password', ['as' => 'forgot_password', 'uses' => 'CalloutController@forgot']);
Route::post('forgot-password', ['as' => 'forgot_password', 'uses' => 'CalloutController@postForgot']);

Route::get('register', ['uses' => 'CalloutController@getRegister']);
Route::post('register', ['uses' => 'CalloutController@postRegister']);

Route::get('login', ['uses' => 'CalloutController@getLogin']);
Route::post('login',  ['uses' => 'CalloutController@postLogin']);

Route::get('create-callout',['uses' => 'CalloutController@getCreateCallout']);
Route::post('create-callout',['uses' => 'CalloutController@postCreateCallout']);
Route::get('edit-callout',['uses' => 'CalloutController@getEditCallout']);
Route::post('edit-callout/{id}',['uses' => 'CalloutController@postEditCallout']);
Route::get('profile',['uses' => 'CalloutController@getUserProfile']);

Route::get('edit-profile',['uses' => 'CalloutController@getProfileEdit']);
Route::post('edit-profile/{id}',['uses' => 'CalloutController@postProfileEdit']);

/* Static Pages */
Route::get('about', function () { return view('pages.about'); });
Route::get('contact', function () { return view('pages.contact'); });
