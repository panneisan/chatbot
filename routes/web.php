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
Route::get("profile","UserController@profile");
Route::post("profile","UserController@store");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get("/chatpage","ChatController@create")->middleware('auth');
Route::post("/create-chat","ChatController@store")->name('chat.store');
Route::post("/delete","ChatController@destroy")->name('chat.delete');

//like
Route::get('/like-post/{id}',"LikeController@store")->name('like-post');