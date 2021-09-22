<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\TbCarrinhoController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Rotas publicas =============================================================================================

// Usuários
Route::post('/registrar', [AuthController::class, 'registrar']);
Route::post('/login', [AuthController::class, 'login']);

// Produtos
Route::get('/produtos', [ProdutoController::class, 'index']);
Route::get('/produto/{id}', [ProdutoController::class, 'show']);
Route::get('/produtos/procurar/{s}', [ProdutoController::class, 'search']);

// Categorias
Route::get('/categorias', [CategoriaController::class, 'index']);
Route::get('/produtos/categoria/{id}', [CategoriaController::class, 'produtosPorCategoria']);
Route::get('/categoria/{id}', [CategoriaController::class, 'show']);

// Rotas protegidas
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Usuários
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Produtos
    Route::post('/produto', [ProdutoController::class, 'store']);
    Route::put('/produto/{id}', [ProdutoController::class, 'update']);
    Route::delete('/produto/{id}', [ProdutoController::class, 'destroy']);

    // Categorias
    Route::post('/categoria', [CategoriaController::class, 'store']);
    Route::put('/categoria/{id}', [CategoriaController::class, 'update']);
    Route::delete('/categoria/{id}', [CategoriaController::class, 'destroy']);

    //Carrinho
    Route::get('/carrinho', [TbCarrinhoController::class, 'carrinho']);
    Route::post('/carrinho', [TbCarrinhoController::class, 'store']);
    Route::get('/produtos/carrinho', [TbCarrinhoController::class, 'index']);
    Route::delete('/produtos/carrinho', [TbCarrinhoController::class, 'destroy']);
    Route::delete('/produto/carrinho/{id}', [TbCarrinhoController::class, 'excluirProdutoCarrinho']);
});
