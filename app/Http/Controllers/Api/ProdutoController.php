<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();

        return response()->json($produtos, 200);
    }

    public function store(Request $request)
    {
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

        if(empty($produto)){
                return response()->json(['message' => 'Falha ao criar produto'], 406);
        }

        return response()->json(['message' => 'Produto '.$produto->nm_produto.' criado com sucesso'], 200);
    }

    public function show($id)
    {
        $produto = Produto::findOrFail($id);

        $categoria = $produto->categoria()->first();

        return response()->json(['produto' => $produto, 'categoria' => $categoria->nm_categoria], 200);
    }

    public function search($s)
    {
        $produtos = Produto::where('nm_produto', 'like', '%'.$s.'%')->get();

        return response()->json($produtos, 200);
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $campos;

        if($produto->nm_produto == $request->nm_produto){
            $campos = $request->validate([
                'desc_produto' => 'required|string',
                'vl_produto' => 'required',
                'id_categoria' => 'required',
            ]);
        } else {
            $campos = $request->validate([
                'nm_produto' => 'required|string|unique:produtos,nome',
                'desc_produto' => 'required|string',
                'vl_produto' => 'required',
                'id_categoria' => 'required',
            ]);
        }

        $produto->update($campos->all());

        return response()->json(['message' => 'Produto atualizado com sucesso'], 200);
    }

    public function destroy($id)
    {
        /* ****************************
            Falta definir metodo

        ******************************* */
        // $produto = Produto::findOrFail($id);
        // $novo_status;
        // $alteracao;

        // if($produto->status == 'A'){
        //     $novo_status = 'I';
        //     $alteracao = 'inativado';
        // } else {
        //     $novo_status = 'A';
        //     $alteracao = 'ativado';
        // }
        // $produto->update([
        //     'status' => $novo_status,
        // ]);

        // return response()->json(['message' => 'Produto '.$alteracao. ' com sucesso'], 200);
    }
}