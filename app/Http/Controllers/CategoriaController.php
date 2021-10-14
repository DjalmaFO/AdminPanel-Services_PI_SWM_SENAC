<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    public function index(){
        return view('admin.categoria.index')->with('categorias', Categoria::all());
    }

    public function create(){
        return view('admin.categoria.create');
    }

    public function store(Request $request){
        $request->validate([
            'nm_categoria' => 'required|string|unique:categorias,nm_categoria'
        ]);

        Categoria::create($request->all());

        session()->flash('success', 'Categoria criada com sucesso');

        return redirect()->route('categoria.index');
    }

    public function show($idCategoria){
        $categoria = Categoria::findOrFail($idCategoria);

        return view('admin.categoria.show')->with('categoria', $categoria);
    }

    public function edit($id){
        $c = Categoria::findOrFail($id);

        return view('admin.categoria.edit')->with('categoria', $c);
    }

    public function update(Request $request, $id){
        $c = Categoria::findOrFail($id);

        if($c->nm_categoria != $request->nm_categoria){
            $request->validate([
                'nm_categoria' => 'required|string|unique:categorias,nm_categoria'
            ]);
        }

        Categoria::where('id', $id)->update([
            'nm_categoria' => $request->nm_categoria,
        ]);

        session()->flash('success', 'Categoria atualizada com sucesso!');

        return redirect()->route('categoria.index');
    }

    public function destroy($id){
        $categoria = Categoria::findOrFail($id);

        $produtos = $categoria->produtos()->get();

        if(\sizeof($produtos)){
            session()->flash('error', 'Você não pode apagar uma categoria vinculada a um produto');
            return redirect()->back();
        }

        $categoria->delete();

        session()->flash('success', 'Categoria foi apagada com sucesso!');
        return redirect()->route('categoria.index');
    }

}
