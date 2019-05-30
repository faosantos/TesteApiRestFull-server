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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//referente ao aluno
Route::get('/aluno/add', 'HomeController@create');
Route::get('aluno/{id}', 'HomeController@show');
Route::get('aluno/delete/{id}', 'HomeController@destroy');
Route::post('/aluno/add', 'HomeController@store');
Route::post('/aluno/update/{id}', 'HomeController@update');

Route::post('/search/aluno', 'HomeController@findAluno');