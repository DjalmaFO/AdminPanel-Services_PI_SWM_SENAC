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

Route::get('/admin/categoria', [CategoriaController::class, 'index'])->name('categoria.index');
Route::get('/admin/categoria/create', [ProdutoController::class, 'create'])->name('categoria.create');

Route::get('/admin/produtos', [ProdutoController::class, 'index'])->name('adm.produtos.index');
Route::get('/admin/produto/show/{id}', [ProdutoController::class, 'show'])->name('adm.produto.show'); 
Route::get('/admin/produto/create', [ProdutoController::class, 'create'])->name('adm.produto.create');
Route::post('/admin/produto/store/', [ProdutoController::class, 'store'])->name('adm.produto.store');
Route::get('/admin/produto/edit/{id}', [ProdutoController::class, 'edit'])->name('adm.produto.edit');
Route::post('/admin/produto/update/{id}', [ProdutoController::class, 'update'])->name('adm.produto.update');
Route::get('/admin/produto/destroy/{id}', [ProdutoController::class, 'destroy'])->name('adm.produto.destroy');
