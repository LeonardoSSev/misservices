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



Route::group([], function(){
    Route::get('/', function () {
        return view('index');
    });
    Route::get('/servicos', function () {
        return view('servicos');
    });
    Route::get('/como-funciona', function () {
        return view('como-funciona');
    });
    Route::get('/contato', function () {
        return view('contato');
    });
    Route::get('/acesse', function () {
        return view('acesse');
    });
    Route::get('/cadastro', function () {
        return view('cadastro');
    });
    Route::get('/admin', function () {
        return view('admin');
    });
});


Route::resource('user', 'UserController');