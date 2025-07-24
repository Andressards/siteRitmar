<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CadastroCursoController;

/*
|--------------------------------------------------------------------------|
| Web Routes                                                                |
|--------------------------------------------------------------------------|
*/

// Página principal (listar cursos)
Route::get('/', [SiteController::class, 'index'])->name('site.index');
Route::get('/site', [SiteController::class, 'index'])->name('site');  // Página de exibição dos cursos
Route::get('/buscar', [SiteController::class, 'buscar'])->name('site.buscar');


// Rota para exibir os detalhes de um curso
Route::get('/site/cursos/{id}', [SiteController::class, 'show'])->name('site.show');  // Detalhes do curso

// Rotas de autenticação
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rotas de administração de cursos (somente autenticados)
Route::middleware(['auth'])->group(function () {
    Route::get('/cadastro', [CadastroCursoController::class, 'index'])->name('cadastro.index');
    Route::get('/cadastro/create', [CadastroCursoController::class, 'create'])->name('cadastro.create');
    Route::post('/cadastro/store', [CadastroCursoController::class, 'storeProdutos'])->name('cadastro.store');
    Route::get('/cadastro/{id}/edit', [CadastroCursoController::class, 'edit'])->name('curso.edit');
    Route::put('/cadastro/{id}', [CadastroCursoController::class, 'update'])->name('cadastro.update');
    Route::get('/cadastro/{id}/toggle-status', [CadastroCursoController::class, 'toggleStatus'])->name('curso.toggleStatus');
});
