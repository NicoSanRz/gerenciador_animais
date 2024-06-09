<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacinaController;
use App\Http\Controllers\AnimaisController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// ROTAS DE AUTENTICAÇÃO
Route::get('/login', [UsuarioController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UsuarioController::class, 'login']);
Route::post('/logout', [UsuarioController::class, 'logout'])->name('logout');

// Rota para a página Sobre
Route::get('/sobre', function () {
    return view('about');
})->name('sobre');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// Rotas de Usuários
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/cadastrar', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/lista', [UsuarioController::class, 'list'])->name('usuarios.list');
Route::get('/usuarios/editar/{id}', [UsuarioController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::get('/usuarios/excluir/{id}', [UsuarioController::class, 'confirmDelete'])->name('usuarios.confirm-delete');
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

// Rotas de Animais
Route::get('/animais', [AnimaisController::class, 'index'])->name('animais.index');
Route::get('/animais/cadastrar', [AnimaisController::class, 'create'])->name('animais.create');
Route::post('/animais', [AnimaisController::class, 'store'])->name('animais.store');
Route::get('/animais/lista', [AnimaisController::class, 'list'])->name('animais.list');
Route::get('/animais/editar/{id}', [AnimaisController::class, 'edit'])->name('animais.edit');
Route::put('/animais/{id}', [AnimaisController::class, 'update'])->name('animais.update');
Route::get('/animais/excluir/{id}', [AnimaisController::class, 'confirmDelete'])->name('animais.confirm-delete');
Route::delete('/animais/{id}', [AnimaisController::class, 'destroy'])->name('animais.destroy');

// Rotas de Vacinas
Route::get('/animais/{id}/vacinas', [VacinaController::class, 'index'])->name('animais.vacinas');
Route::get('/animais/{id}/vacinas/create', [VacinaController::class, 'create'])->name('vacinas.create');
Route::post('/vacinas', [VacinaController::class, 'store'])->name('vacinas.store');
Route::get('/animais/{animal_id}/vacinas/editar/{vacina_id}', [VacinaController::class, 'edit'])->name('vacinas.edit');
Route::put('/vacinas/{id}', [VacinaController::class, 'update'])->name('vacinas.update');
Route::get('/vacinas/excluir/{id}', [VacinaController::class, 'confirmDelete'])->name('vacinas.confirm-delete');
Route::delete('/vacinas/{id}', [VacinaController::class, 'destroy'])->name('vacinas.destroy');
