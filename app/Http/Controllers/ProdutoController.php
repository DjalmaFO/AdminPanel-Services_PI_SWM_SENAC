<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
   public function index(){

       return view('admin.produtos.index')->with('produtos', Produto::all());
    }

    public function show($id){
        return \view('admin.produtos.show')->with('produto', Produto::findOrFail($id));
   }

   public function create(){
       return \view('admin.produtos.create')->with('categorias', Categoria::all());
   }

   public function store(Request $request){
     $campos = $request->validate([
          'nm_produto' => 'required|string|unique:produtos,nm_produto',
          'desc_produto' => 'required|string',
          'vl_produto' => 'required',
          'qtd_produto' => 'required',
          'id_categoria' => 'required',
      ]);

      $produto = Produto::create([
          'nm_produto' => $campos['nm_produto'],
          'desc_produto' => $campos['desc_produto'],
          'vl_produto' => $campos['vl_produto'],
          'qtd_produto' => $campos['qtd_produto'],
          'id_categoria' => $campos['id_categoria'],
        ]);

        // upload de Imagem
        if($request->hasFile('img_produto') && $request->file('img_produto')->isValid()){
            $caminhoImagem = $request->file('img_produto')->store('img/produtos');

            Produto::where('id', $produto->id)->update([
                'img_produto' => $caminhoImagem,
            ]);
        }

      session()->flash('success', 'Produto foi cadastrado com sucesso');
      return view('admin.produtos.index')->with('produtos', Produto::all());
   }

   public function edit($id){
        return \view('admin.produtos.edit')->with(['produto' => Produto::findOrFail($id), 'categorias' => Categoria::all()]);
   }

   public function update(Request $request, $id){
     $produto = Produto::findOrFail($id);

     if($produto->nm_produto == $request->nm_produto){
         $request->validate([
             'desc_produto' => 'required|string',
             'vl_produto' => 'required',
             'id_categoria' => 'required',
         ]);
     } else {
         $request->validate([
             'nm_produto' => 'required|string|unique:produtos,nm_produto',
             'desc_produto' => 'required|string',
             'vl_produto' => 'required',
             'id_categoria' => 'required',
         ]);
     }

        if ($request->hasFile('img_produto') && $request->file('img_produto')->isValid()) {
            $caminhoImagem = $request->file('img_produto')->store('img/produtos');

            $produto->update([
                'img_produto' => $caminhoImagem,
            ]);
        }

        $produto->update([
            'nm_produto' => $request->nm_produto,
            'desc_produto' => $request->desc_produto,
            'vl_produto' => $request->vl_produto,
            'id_categoria' => $request->id_categoria,
        ]);

     session()->flash('success', 'Produto foi alterado com sucesso');
     return view('admin.produtos.index')->with('produtos', Produto::all());
   }

   public function destroy($id){
    $produto = Produto::findOrFail($id);
    $novo_status;

    if($produto->status == 'A'){
        $novo_status = 'I';
    } else {
        $novo_status = 'A';
    }

    $produto->update([
        'status' => $novo_status,
    ]);

    $produto->delete();
    session()->flash('success', 'Produto foi apagado com sucesso');
    return view('admin.produtos.index')->with('produtos', Produto::all());
   }
}
