<?php

use App\Http\Controllers\Api\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EstadoController;
use App\Http\Controllers\Api\LivroController;

Route::apiResource('/produtos', ProdutoController::class);
Route::get('/estados', [EstadoController::class, 'index']);
Route::get('/estados/{uf}/municipios', [EstadoController::class, 'municipios']);
Route::apiResource('/livros', LivroController::class);

