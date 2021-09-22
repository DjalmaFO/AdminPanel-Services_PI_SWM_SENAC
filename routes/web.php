<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
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
Route::get('/produto/{id}', [ProdutoController::class, 'show'])->name('produto.show');

Route::get('/admin/categoria', [CategoriaController::class, 'index'])->name('categoria.index');
Route::get('/admin/categoria/create', [ProdutoController::class, 'create'])->name('categoria.create');