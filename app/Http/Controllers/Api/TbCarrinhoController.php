<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TbProdutoCarrinho;
use App\Models\TbCarrinho;
use App\Models\Produto;

class TbCarrinhoController extends Controller
{
    public function criarCarrinho() {
        $idUser = auth()->user()->id;
        $carrinho = TbCarrinho::create([
            'id_user' => $idUser,
        ]);

        return $carrinho;
    }

    public function index()
    {
        $carrinho = auth()->user()->getCarrinho()->first();
        
        if(empty($carrinho)){
            $idUser = auth()->user()->id;
            $carrinho = TbCarrinho::create([
                'id_user' => $idUser,
            ]);
        }

        $produtos = $carrinho->getProdutos()->get();

        if(empty($produtos)){
            return response()->json(['msg' => 'Ops, carrinho vazio :( '], 200, $headers);
        }

        $arrayProdutos = [];

        foreach ($produtos as $p){
            $prod = Produto::findOrFail($p->id_produto);

            $montarItemArray = ([
                'id_produto' => $prod->id,
                'nm_produto' => $prod->nm_produto,
                'vl_produto' => $prod->vl_produto,
                'img_produto' => $prod->img_produto,
                'qtd_produto' => $p->qtd_produto
            ]);

            array_push($arrayProdutos, $montarItemArray);
        }

        return response()->json($arrayProdutos, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carrinho = auth()->user()->getCarrinho()->first();
        if(empty($carrinho)){
            $idUser = auth()->user()->id;
            $carrinho = TbCarrinho::create([
                'id_user' => $idUser,
            ]);
        }

        $validado = $request->validate([
            'id_produto' => 'required|integer',
            'qtd_produto' => 'required|integer',
        ]);

        $c = TbProdutoCarrinho::create([
            'id_carrinho' => $carrinho->id,
            'id_produto' => $validado['id_produto'],
            'qtd_produto' => $validado['qtd_produto'],
        ]);



        return response()->json($c, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
