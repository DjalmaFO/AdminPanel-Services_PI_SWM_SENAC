<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
   public function index(){
       $produtos = Produto::all();

       return \view('admin.produtos.index', ['produtos', $produtos]);
    }

    public function show($id){
        $produto = Produto::findOrFail($id);

        $produto = DB::where('id', $id)->first();

        return \view('admin.produtos.show', ['produto', $produto]);
   }

   public function criar(){
       return \view('admin.produtos.create');
   }

   public function insert($produto){
        $produtos = Produto::get();
        return \view('admin.produtos.index', ['produtos', $produtos]);
   }

   public function edit($id){
        $produtos = Produto::get();
        return \view('admin.produtos.index', ['produtos', $produtos]);
   }

   public function update($produto){
        $produtos = Produto::get();
        return \view('admin.produtos.index', ['produtos', $produtos]);
   }

   public function inativar($id){
        $produtos = Produto::get();
        return \view('admin.produtos.index', ['produtos', $produtos]);
   }
}
