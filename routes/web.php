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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('students', 'StudentController');
Route::post('/comments/{id}', 'CommentController@addComment')->name('addComment');
Route::get('/comments/{id}', 'CommentController@getComment')->name('getComment');
Route::get('/editForm/{id}', 'CommentController@showEdit')->name('editForm');
Route::patch('/edit/{id}', 'CommentController@edit')->name('edit');
Route::get('/delete/{id}', 'CommentController@delete')->name('delete');

Route::get('/outFollowup/{id}', 'StudentController@outFollowup')->name('outFollowup');
Route::get('/backFollowup/{id}', 'StudentController@backFollowup')->name('backFollowup');