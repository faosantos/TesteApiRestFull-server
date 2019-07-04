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

// Route::get('homeAluno', 'HomeController@indexAluno')->name('homeAluno');

Route::get('/aluno/add', 'AlunoController@create');
Route::get('aluno/{id}', 'AlunoController@show');
Route::get('aluno/delete/{id}', 'AlunoController@destroy');
Route::post('/aluno/add', 'AlunoController@store');
Route::post('/aluno/update/{id}', 'AlunoController@update');

Route::post('/search/aluno', 'HomeController@findAluno');


Auth::routes();

Route::get('dash/home', 'HomeController@index')
        ->name('home')
        ->middleware('auth.unique.user');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// parte nova

// Route::group(['middleware' => ['web']], function () {
//     Route::get('/create-user', 'UserController@index');
//     Route::post('/create-user', 'UserController@store');
//     Route::get('/delete-user/{id}', 'UserController@destroy');

//     Route::get('/turmas/{user_id?}', 'HomeController@turmas');
//     Route::get('/equipamentos/{turma_id?}', 'HomeController@equipments');
    
//     Route::get('/aluno/add', 'AlunoController@create');
//     Route::get('aluno/{id}', 'AlunoController@show');
//     Route::get('aluno/delete/{id}', 'AlunoController@destroy');
//     Route::post('/aluno/add', 'AlunoController@store');
//     Route::post('/aluno/update/{id}', 'AlunoController@update');

//     Route::post('/search/aluno', 'HomeController@findAluno');
   

   
// });
// Route::get('/', 'HomeController@index')->name('home');
// Route::get('/login', function (){
//     // Auth\LoginController@showLoginForm
//     return redirect('/');
// })->name('login');
// Route::post('login', 'Auth\LoginController@login');
// Route::get('logout', 'Auth\LoginController@logout')->name('logout');

