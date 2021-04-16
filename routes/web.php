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

Route::get('/group/create', 'GroupController@create_form');

Route::post('/group/create', 'GroupController@create');

Route::get('/group/join', 'GroupController@join_form');

Route::post('/group/join', 'GroupController@join');

Route::get('/group/{id}', 'GroupController@show_group');

Route::get('/group/edit/{id}', 'GroupController@edit');

Route::post('/group/update/{id}', 'GroupController@update');

Route::delete('/group/delete/{id}', 'GroupController@delete');

Route::get('/group/members_list/{id}', 'GroupController@members_list');

Route::get('/remove_user/{id}/{user_id}', 'GroupController@remove_user');

Route::post('/send_message/{id}', 'MessageController@send_message');

Route::get('/show_messages/{id}', 'MessageController@show_messages');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
