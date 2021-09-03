<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produto', [ProdutoController::class, 'index'])->name('produto.index');
Route::get('/produto/buscar/{p}', [ProdutoController::class, 'buscar'])->name('produto.find');
Route::get('/produto/criar', [ProdutoController::class, 'criar'])->name('produto.create');
Route::post('/produto/inserir/{produto}', [ProdutoController::class, 'inserir'])->name('produto.insert');
Route::get('/produto/visualizar/{id}', [ProdutoController::class, 'visualizar'])->name('produto.show');
Route::get('/produto/editar/{id}', [ProdutoController::class, 'editar'])->name('produto.edit');
Route::post('/produto/alterar/{produto}', [ProdutoController::class, 'alterar'])->name('produto.update');
Route::post('/produto/inativar/{id}', [ProdutoController::class, 'inativar'])->name('produto.inativar');
