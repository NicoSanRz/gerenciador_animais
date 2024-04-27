<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/usuarios', 'App\Http\Controllers\UsuarioController@index')->name('usuarios.index');
