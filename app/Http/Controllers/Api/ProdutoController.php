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
            'nome' => 'required|string|unique:produtos,nome',
            'descricao' => 'required|string',
            'preco' => 'required',
        ]);

        $produto = Produto::create([
            'nome' => $campos['nome'],
            'descricao' => $campos['descricao'],
            'preco' => $campos['preco'],
        ]);

        if(empty($produto)){
                return response()->json(['message' => 'Falha ao criar produto'], 406);
        }

        return response()->json(['message' => 'Produto '.$produto->nome.' criado com sucesso'], 200);
    }

    public function show($id)
    {
        return response()->json(Produto::findOrFail($id), 200);
    }

    public function search($s)
    {
        $produtos = Produto::where('nome', 'like', '%'.$s.'%')->get();

        return response()->json($produtos, 200);
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);

        if($produto->nome == $request->nome){
            $campos = $request->validate([
                'descricao' => 'required|string',
                'preco' => 'required',
            ]);
        } else {
            $campos = $request->validate([
                'nome' => 'required|string|unique:produtos,nome',
                'descricao' => 'required|string',
                'preco' => 'required',
            ]);
        }

        $produto->update($request->all());

        return response()->json(['message' => 'Produto atualizado com sucesso'], 200);
    }

    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        $novo_status;
        $alteracao;

        if($produto->status == 'A'){
            $novo_status = 'I';
            $alteracao = 'inativado';
        } else {
            $novo_status = 'A';
            $alteracao = 'ativado';
        }
        $produto->update([
            'status' => $novo_status,
        ]);

        return response()->json(['message' => 'Produto '.$alteracao. ' com sucesso'], 200);
    }
}
