<?php

use App\Http\Controllers\Api\ProdutoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EstadoController;

Route::apiResource('/produtos', ProdutoController::class);
Route::get('/estados', [EstadoController::class, 'index']);
Route::get('/estados/{uf}/municipios', [EstadoController::class, 'municipios']);

/*
GET     /api/produtos
POST    /api/produtos
SHOW    /api/produtos/id
PUT     /api/produtos/id
*/