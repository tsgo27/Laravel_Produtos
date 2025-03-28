<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ApiProdutos;
use Illuminate\Support\Facades\Route;


//Rota que trás todos os Metodo da controller ApiProdutos
//Route::apiResource('produtos', 'App\Http\Controllers\ApiProdutos');

Route::get('/produtos', [ApiProdutos::class, 'index']); //Exibir produtos
Route::put('/produtos/{id}', [ApiProdutos::class, 'update']); // Atualizar produto
Route::delete('/produtos/{id}', [ApiProdutos::class, 'destroy']); // Deletar item

