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
    return view('welcome');
});

// Route::get('post',function(){  // sure true Route
//     return 'hello yos';
// });

Route::get('post','postsController@index')->name('post');
Route::get('showposts/{id}','postsController@show')->name('posts.show')->middleware('auth');
Route::get('post/createposts','postsController@create')->name('posts.create')->middleware('auth');
Route::post('post','postsController@store')->name('posts.store');
Route::get('post/{id}/edit','postsController@edit')->name('posts.edit');
Route::post('post/{id}/update','postsController@update')->name('posts.update');
//Route::get('deleteposts','postsController@delete')->name('posts.delete');
Route::delete('post/{post}','postsController@destroy');
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');




Route::get('/home', 'HomeController@index')->name('home');
