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

Route::resource('funcionarios', 'FuncionarioController');

Route::get('cadastroFuncionarios', 'FuncionarioController@create');

Route::get('listarFuncionarios', 'FuncionarioController@index');

Route::get('login', function () {
    return view('login');
});

Auth::routes();
