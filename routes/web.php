<?php

use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TbPedidoController;
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

Route::get('/adm_login', [AuthController::class, 'newLogin'])->name('new.login');
// Route::post('/adm_register', [AuthController::class, 'newRegister'])->name('new.register');
Route::get('/adm_logout', [AuthController::class, 'sair'])->name('sair');


Route::middleware(['admin'])->group(function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //Categorias
    Route::get('/admin/categoria', [CategoriaController::class, 'index'])->name('categoria.index');
    Route::get('/admin/categoria/create', [CategoriaController::class, 'create'])->name('categoria.create');
    Route::get('/admin/categoria/show/{id}', [CategoriaController::class, 'show'])->name('categoria.show');
    Route::post('/admin/categoria/store', [CategoriaController::class, 'store'])->name('categoria.store');
    Route::get('/admin/categoria/edit/{id}', [CategoriaController::class, 'edit'])->name('categoria.edit');
    Route::post('/admin/categoria/update/{id}', [CategoriaController::class, 'update'])->name('categoria.update');
    Route::post('/admin/categoria/destroy/{id}', [CategoriaController::class, 'destroy'])->name('categoria.destroy');


    //Produtos
    Route::get('/admin/produtos', [ProdutoController::class, 'index'])->name('adm.produtos.index');
    Route::get('/admin/produto/show/{id}', [ProdutoController::class, 'show'])->name('adm.produto.show');
    Route::get('/admin/produto/create', [ProdutoController::class, 'create'])->name('adm.produto.create');
    Route::post('/admin/produto/store', [ProdutoController::class, 'store'])->name('adm.produto.store');
    Route::get('/admin/produto/edit/{id}', [ProdutoController::class, 'edit'])->name('adm.produto.edit');
    Route::post('/admin/produto/update/{id}', [ProdutoController::class, 'update'])->name('adm.produto.update');
    Route::post('/admin/produto/destroy/{id}', [ProdutoController::class, 'destroy'])->name('adm.produto.destroy');

    // Perfil Admin
    Route::get('/admin/perfil', [PerfilController::class, 'index'])->name('perfil');
    Route::get('/admin/perfil/edit', [PerfilController::class, 'edit'])->name('edit.perfil');
    Route::post('/admin/perfil/update/{id}', [PerfilController::class, 'update'])->name('update.perfil');

    //Pedidos
    Route::get('/admin/pedidos/{status}', [TbPedidoController::class, 'index'])->name('adm.pedidos');
    Route::get('/admin/pedidos/show/{id}', [TbPedidoController::class, 'show'])->name('adm.pedidos.show');
    Route::get('/admin/pedidos/edit/{id}', [TbPedidoController::class, 'edit'])->name('adm.pedidos.edit');
    Route::post('/admin/pedidos/update/{id}', [TbPedidoController::class, 'update'])->name('adm.pedidos.update');
});
