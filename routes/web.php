<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*Route::get('/', function () {
    return view('welcome');
});*/

// Aqui vou setar as variáveis para pegar os devidos Controllers
$usuario_c = 'App\Http\Controllers\UsuarioController';
$animais_c = 'App\Http\Controllers\AnimaisController';
$vacinas_c = 'App\Http\Controllers\VacinaController';

// ROTAS DE AUTENTICAÇÃO

Route::get('/login', $usuario_c . '@showLoginForm')->name('login');
Route::post('/login', $usuario_c . '@login');
Route::post('/logout', $usuario_c . '@logout')->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');





Route::get('/usuarios', $usuario_c . '@index')->name('usuarios.index');
Route::get('/animais', $animais_c  . '@index')->name('animais.index');
Route::get('/vacinas', $vacinas_c  . '@index')->name('vacinas.index');

// Cadastrar
Route::get('/usuarios/cadastrar', $usuario_c . '@create')->name('usuarios.create');
Route::post('/usuarios', $usuario_c . '@store')->name('usuarios.store');

Route::get('/animais/cadastrar', $animais_c . '@create')->name('animais.create');
Route::post('/animais', $animais_c . '@store')->name('animais.store');

Route::get('/vacinas/cadastrar', $vacinas_c . '@create')->name('vacinas.create');
Route::post('/vacinas', $vacinas_c . '@store')->name('vacinas.store');

// Ler
Route::get('/usuarios/lista', $usuario_c . '@list')->name('usuarios.list');

Route::get('/animais/lista', $animais_c  . '@list')->name('animais.list');

Route::get('/vacinas/lista', $vacinas_c  . '@list')->name('vacinas.list');

// Editar
Route::get('/usuarios/editar/{id}', $usuario_c . '@edit')->name('usuarios.edit');
Route::put('/usuarios/{id}', $usuario_c . '@update')->name('usuarios.update');

Route::get('/animais/editar/{id}', $animais_c  . '@edit')->name('animais.edit');
Route::put('/animais/{id}', $animais_c . '@update')->name('animais.update');

Route::get('/vacinas/editar/{id}', $vacinas_c  . '@edit')->name('vacinas.edit');
Route::put('/vacinas/{id}', $vacinas_c . '@update')->name('vacinas.update');

// Exclusão
Route::get('/usuarios/excluir/{id}', $usuario_c . '@confirmDelete')->name('usuarios.confirm-delete');
Route::delete('/usuarios/{id}', $usuario_c . '@destroy')->name('usuarios.destroy');

Route::get('/animais/excluir/{id}', $animais_c . '@confirmDelete')->name('animais.confirm-delete');
Route::delete('/animais/{id}', $animais_c . '@destroy')->name('animais.destroy');

Route::get('/vacinas/excluir/{id}', $vacinas_c . '@confirmDelete')->name('vacinas.confirm-delete');
Route::delete('/vacinas/{id}', $vacinas_c . '@destroy')->name('vacinas.destroy');