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


Auth::routes();


Route::get('/', function () {
    return redirect()->route('home');
});
Route::get('/beers', 'HomeController@index')->name('home');
Route::get('/beers/random', 'HomeController@random')->name('random');


Route::get('/beers/{id}/comment', function($id) {
    return redirect()->route('new_comment', [$id]);
});
Route::get('/beers/{id}/comment/new', 'HomeController@commentNew')->name('new_comment');
Route::post('/beers/{id}/comment/post', 'HomeController@commentPost')->name('post_comment');


Route::get('/beers/{id}', 'HomeController@show')->name('detail');


// Profile
Route::get('/profile', 'UserController@edit')->name('profile');
Route::post('/profile/update', 'UserController@update')->name('profileUpdate');
