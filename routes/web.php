<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Controller;


//-------------Config páge Home------------------->
Route::get('/', [Controller::class, 'home'])->name('home');


//-------------Config rota LoginController------------------->
Route::get('/login', [LoginController::class, 'login'])->name('login');    
Route::post('/auth', [LoginController::class, 'auth'])->name('auth-user');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// Grupo de rotas protegidas pelo middleware de autenticação
Route::middleware(['auth', 'auth.session'])->group(function () {
    
    //-----Main
    Route::get('/index', [ProdutoController::class, 'index'])->name('index');

    //-----Create
    Route::get('/create', [ProdutoController::class, 'create'])->name('produtos-create');

    //-----Salvar
    Route::post('/index', [ProdutoController::class, 'store'])->name('produtos-store');

    //-----Editar
    Route::get('/{id}/edit', [ProdutoController::class, 'edit'])->where('id', '[0-9]+')->name('produtos-edit');

    //-----Update
    Route::put('/{id}', [ProdutoController::class, 'update'])->where('id', '[0-9]+')->name('produtos-update');

    //-----Deletar
    Route::delete('/{id}', [ProdutoController::class, 'destroy'])->where('id', '[0-9]+')->name('produtos-destroy');
});



//----------Tratar erro de página não encontrada com URL amigavél------------>
Route::fallback(function () {
    return view('404');
});
