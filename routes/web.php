<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/usuarios', 'App\Http\Controllers\UsuarioController@index')->name('usuarios.index');

// Cadastrar
Route::get('/usuarios/cadastrar', 'App\Http\Controllers\UsuarioController@create')->name('usuarios.create');
Route::post('/usuarios', 'App\Http\Controllers\UsuarioController@store')->name('usuarios.store');

// Ler
Route::get('/usuarios/lista', 'App\Http\Controllers\UsuarioController@list')->name('usuarios.list');

// Editar
Route::get('/usuarios/editar/{id}', 'App\Http\Controllers\UsuarioController@edit')->name('usuarios.edit');
Route::put('/usuarios/{id}', 'App\Http\Controllers\UsuarioController@update')->name('usuarios.update');

// Exclusão
Route::get('/usuarios/excluir/{id}', 'App\Http\Controllers\UsuarioController@confirmDelete')->name('usuarios.confirm-delete');
Route::delete('/usuarios/{id}', 'App\Http\Controllers\UsuarioController@destroy')->name('usuarios.destroy');
