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

Route::resource('requests','RequestsController');

Route::get('display',
'UserController@display')->name('display_account');

Route::post('animals/requestAdopt/{id}', 'RequestController@requestAdopt');

Route::get('/requests', 'RequestController@showRequests');

Route::get('/adoptions', 'RequestController@showAdoptions');

Route::post('requests/approve/{id}', ['uses' => 'RequestController@approve'])->name('requests.approve');

Route::post('requests/deny/{id}', ['uses' => 'RequestController@deny'])->name('requests.deny');