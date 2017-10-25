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
    return view('index');
});

//Route::get('*', function(){
//    return file_exists(public_path('js/index.html'));
//});

//Route::any('{path?}', function() {
//    return view("index");
//})->where("path", ".+");

//Gambiarra monstruosa aqui
Route::get('/acesso/admin', function(){ return view('index');});

Route::resource('user', 'UserController');