<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{user_id}', 'UserController@index')->name('user.index');
Route::get('/user/portada/image/{filename}', 'UserController@portada')->name('user.portada');
Route::get('/user/perfil/image/{filename}', 'UserController@perfil')->name('user.perfil');
Route::get('/publication/{filename}', 'PublicationController@getFile')->name('post.file');
Route::get('/publication/comment/{filename}', 'PublicationController@commentFile')->name('comment.file');
Route::get('/user/albums/{filename}', 'UserController@album')->name('album.file');
