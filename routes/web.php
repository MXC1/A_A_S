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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('animals','AnimalController');

Route::resource('users','UserController');

Route::post('animals/requestAdopt/{id}', 'AnimalController@requestAdopt');

Route::get('display',
'UserController@display')->name('display_account');

Route::get('/requests', 'AnimalController@showRequests');

Route::post('requests/approve/{$id}', 'AnimalController@approve')->name('approve');

Route::post('requests/deny/{$id}', 'AnimalController@deny')->name('deny');