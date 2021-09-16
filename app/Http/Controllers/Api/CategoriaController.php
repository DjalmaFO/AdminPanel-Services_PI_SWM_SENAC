<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Categoria::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos = $request->validate([
            'nm_categoria' => 'required|string|unique:categorias,nm_categoria',
        ]);

        $categoria = Categoria::create([
            'nm_categoria' => $campos['nm_categoria'],
        ]);

        return response()->json(['message', 'Categoria criada com sucesso'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Categoria::findOrFail($id), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $oldCategoria = Categoria::findOrFail($id);

        if($oldCategoria->nm_categoria == $request->nm_categoria){
            return response()->json([
                'message', 'Nome da categoria não precisou ser alterado'
            ], 200);
        }

        $campos = $request->validate([
            'nm_categoria' => 'required|string|unique:categorias,nm_categoria',
        ]);
        
        $oldCategoria->update([
            'nm_categoria' => $campos['nm_categoria'],
        ]);

        return response()->json([
            'message', 'Nome da ategoria alterado com sucesso'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $produtos = $categoria->produtos()->get();

        if(sizeof($produtos) > 0){
            return response()->json([
                'message' , 'Não é possivel excluir uma categoria vinculada a um produto'
            ], 406);
        }

        $categoria->delete();

        return response()->json([
            'message', 'Categoria excluida com sucesso'
        ], 200);

    }

    public function produtosPorCategoria($id){
        $categoria = Categoria::findOrFail($id);

        $produtos = $categoria->produtos()->get();

        return response()->json(['categoria' => $categoria->nm_categoria, 'produtos' => $produtos], 200);
    }
}
