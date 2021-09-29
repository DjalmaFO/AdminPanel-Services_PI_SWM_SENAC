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
        Categoria::create($request->all());
        session()->flash('success', 'Categoria criada com sucesso');
        return redirect()->route('admin.categoria.index');
    }

    public function show(Categoria $categoria){
        
    }

    public function edit(Categoria $categoria){
        return view('admin.categoria.index')->with('categoria', $categoria);
    }

    public function update(Request $request, Categoria $categoria){
        $categoria->update($request->all());
        session()->flash('success', 'Categoria atualizada com sucesso!');
        return redirect()->route('admin.categoria.index');
    }

    public function destroy(Categoria $categoria){
        $categoria->delete();
        session()->flash('success', 'Categoria foi apagada com sucesso!');
        return redirect()->route('categoria.index');
    }
}
