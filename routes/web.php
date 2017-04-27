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

Route::group(['middleware' => 'auth'], function() {
    Route::get('categories', 'CategoriesController@index')->name('categories.list');

    Route::get('{user}', 'UsersController@profile')->name('profile');
    Route::get('{user}/notes', 'NotesController@index')->name('notes.list');
    Route::get('{user}/comments', 'CommentsController@index')->name('comments.list');
    Route::get('{user}/notes/{note}', 'NotesController@show')->name('note');

    Route::get('{user}/notes/{note}/edit', 'NotesController@edit')->name('note.edit');
    Route::delete('{user}/notes/{note}/destroy', 'NotesController@destroy')->name('note.delete');

    Route::post('{user}/notes', 'NotesController@store')->name('note.store');
    Route::post('{user}/notes/{note}', 'CommentsController@store')->name('comment.store');

    Route::patch('{user}/notes/{note}', 'NotesController@update')->name('note.update');

    //ajax
    Route::post('note/like', 'LikesController@storeNote')->name('like.note');
});

Route::get('/', 'HomeController@index');
