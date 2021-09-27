<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\TbExplodeProdutosPedido;
use App\Models\TbPedido;
use App\Models\TbProdutoCarrinho;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = \auth()->user()->getPedidos()->get();

        if(empty($pedidos)){
            return response()->json(['msg' => 'Não há histórico de pedidos'], 200);
        }

        $arrayDetalhesPedidos = [];

        foreach($pedidos as $p){
            $idPedido = $p->id;
            $vlTotalPedido = 0;
            $produtosPedido = $p->getProdutosPedido()->get();


            $arrayProdutos = [];
            foreach($produtosPedido as $pp){
                $produto = $pp->detalhesProdutoPedido()->first();
                $vlTotalProduto = $pp->vl_produto * $pp->qtd_produto;

                $detProd = ([
                    'id_produto' => $produto->id,
                    'nm_produto' => $produto->nm_produto,
                    'desc_produto' => $produto->desc_produto,
                    'img_produto' => $produto->img_produto,
                    'vl_produto' => $pp->vl_produto,
                    'qtd_produto' => $pp->qtd_produto,
                    'vl_total' => $vlTotalProduto,
                ]);

                $vlTotalPedido += $vlTotalProduto;

                \array_push($arrayProdutos, $detProd);
                // \array_push($arrayProdutos, $produto);
            }

            \array_push($arrayDetalhesPedidos, [
                'id_pedido' => $idPedido,
                'vl_total' => $vlTotalPedido,
                'produtos' => $arrayProdutos,
            ]);
        }

        return \response()->json(['pedidos' =>$arrayDetalhesPedidos], 200);
    }


    // Inserir pedido
    public function store()
    {
        $user = \auth()->user();
        $carrinho = $user->getCarrinho()->first();
        $produtosPedido =  $carrinho->getProdutosCarrinho()->get();

        if(\sizeof($produtosPedido) == 0){
            return \response()->json(['msg', 'Não há produtos no carrinho'], 200);
        }

        $pedido = TbPedido::create([
            'id_user' => $user->id,
        ]);

        foreach ($produtosPedido as $pp){
            $prod = Produto::findOrFail($pp->id_produto);

            TbExplodeProdutosPedido::create([
                'id_pedido' => $pedido->id,
                'id_produto' => $pp->id_produto,
                'qtd_produto' => $pp->qtd_produto,
                'vl_produto' => $prod->vl_produto,
            ]);

            TbProdutoCarrinho::where([['id_produto', $pp->id_produto], ['id_carrinho', $carrinho->id]])->delete();
        }

        return \response()->json(['msg' => 'Pedido gerado com sucesso', 'numero_pedido' => $pedido->id], 200);
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
