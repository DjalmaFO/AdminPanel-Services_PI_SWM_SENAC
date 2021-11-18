<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TbProdutoCarrinho;
use App\Models\TbCarrinho;
use App\Models\Produto;

class TbCarrinhoController extends Controller
{
    public function index()
    {
        $carrinho = auth()->user()->getCarrinho()->first();

        if(empty($carrinho)){
            $carrinho = $this->criarCarrinho();
        }

        $produtos = $carrinho->getProdutosCarrinho()->get();

        // if(sizeof($produtos) == 0){
        //     return response()->json([$produtos], 200);
        // }

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

    public function store(Request $request)
    {
        $carrinho = auth()->user()->getCarrinho()->first();
        if(empty($carrinho)){
            $carrinho = $this->criarCarrinho();
        }

        $validado = $request->validate([
            'id_produto' => 'required|integer',
            'qtd_produto' => 'required|integer',
        ]);

        $produto = Produto::findOrFail($validado['id_produto']);
        $produtoCarrinho = TbProdutoCarrinho::where([['id_produto', '=', $validado['id_produto']], ['id_carrinho', '=', $carrinho->id]])->first();

        if(empty($produtoCarrinho)){
            TbProdutoCarrinho::create([
                'id_carrinho' => $carrinho->id,
                'id_produto' => $validado['id_produto'],
                'qtd_produto' => $validado['qtd_produto'],
            ]);
        } else {
            if ($validado['qtd_produto'] < 0 && $produtoCarrinho->qtd_produto <= $validado['qtd_produto'] * -1) {
                $resp = $this->excluirProdutoCarrinho($validado['id_produto']);
                return \response()->json($resp->original, 200);
            } else {
                TbProdutoCarrinho::where([
                    ['id_produto', '=', $validado['id_produto']], ['id_carrinho', '=', $carrinho->id]
                ])->update([
                    'qtd_produto' => ($validado['qtd_produto'] + $produtoCarrinho->qtd_produto),
                ]);
            }
        }

        return response()->json(['msg' => 'Produto '.$produto->nm_produto.' adicionado ao carrinho sucesso'], 200);
    }


    public function destroy()
    {
        $carrinho = auth()->user()->getCarrinho()->first();

        if(empty($carrinho)){
            return \response()->json(['msg' => 'Não há carrinho para ser esvaziado'], 404);
        }

        TbProdutoCarrinho::where('id_carrinho', $carrinho->id)->delete();

        return \response()->json(['msg' => 'Carrinho esvaziado com sucesso']);
    }

    public function excluirProdutoCarrinho($id){
        $carrinho = auth()->user()->getCarrinho()->first();
        $produtoCarrinho = TbProdutoCarrinho::where([['id_produto','=', $id], ['id_carrinho', '=', $carrinho->id]])->first();

        if(empty($produtoCarrinho) || empty($carrinho)){
            return \response()->json(['msg' => 'Produto ou carrinho inexistente'], 404);
        }

        TbProdutoCarrinho::where([['id_produto', '=', $id], ['id_carrinho', '=', $carrinho->id]])->delete();

        return \response()->json(['msg' => 'Produto removido do carrinho :('], 200);
    }

    public function criarCarrinho()
    {
        $idUser = auth()->user()->id;
        $carrinho = TbCarrinho::create([
            'id_user' => $idUser,
        ]);

        return $carrinho;
    }

    public function carrinho()
    {
        $carrinho = auth()->user()->getCarrinho()->first();

        if (empty($carrinho)) {
            $carrinho = $this->criarCarrinho();
        }

        return response()->json($carrinho, 200);
    }
}
