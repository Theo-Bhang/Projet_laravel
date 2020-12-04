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

//listing des boardUser
Route::get('boardUser', 'BoardUserController@index')->name('boardUser.index');

//affichage de la page de création
Route::get('boardUser/create', 'BoardUserController@create')->name('boardUser.create');

//création
Route::post('boardUser', 'BoardUserController@store')->name('boardUser.store');

//affichage de la page d'un BoardUser
Route::get('boardUser/{boardUser}', 'BoardUserController@show')->name('boardUser.show');

//affichage de la page d'édition
Route::get('boardUser/{boardUser}/edit', 'BoardUserController@edit')->name('boardUser.edit');

//modification
Route::put('boardUser/{boardUser}', 'BoardUserController@update')->name('boardUser.update');

//suppression
Route::delete('boardUser/{boardUser}', 'BoardUserController@destroy')->name('boardUser.destroy');

Route::resource('boardUser', 'BoardUserController');

//listing des Taches
Route::get('task', 'TaskController@index')->name('task.index');

//affichage de la page de création
Route::get('task/create', 'TaskController@create')->name('task.create');

//création
Route::post('task', 'TaskController@store')->name('task.store');

//affichage de la page d'une Tache
Route::get('task/{task}', 'TaskController@show')->name('task.show');

//affichage de la page d'édition
Route::get('task/{task}/edit', 'TaskController@edit')->name('task.edit');

//modification
Route::put('task/{task}', 'TaskController@update')->name('task.update');

//suppression
Route::delete('task/{task}', 'TaskController@destroy')->name('task.destroy');

Route::resource('task', 'TaskController');