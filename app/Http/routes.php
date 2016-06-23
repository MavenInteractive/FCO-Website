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

Route::get('/', function () {
    return view('pages.home');
});


Route::get('callout', ['as' => 'most-viewed', 'uses' => 'CalloutController@index']);
Route::get('callout/{id}', ['as' => 'callout',   'uses' => 'CalloutController@details']);


/* Static Pages */
Route::get('about', function () { return view('pages.about'); });
Route::get('contact', function () { return view('pages.contact'); });
