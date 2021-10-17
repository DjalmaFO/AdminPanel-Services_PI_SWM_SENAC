<?php

namespace App\Http\Controllers;

use App\Models\TbPedido;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TbPedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status)
    {
        $pedidos = '';
        $query = "
            select p.id id, 
            coalesce(p.observacao, ' ') observacao, 
            case 
                when p.status = 'C' then 'Cancelado'
                when p.status = 'N' then 'Novo'
                when p.status = 'E' then 'Entregue'
                else 'Indefinido'
            end status,
            u.name nome,
            u.email email
            from tb_pedidos p
            left join users u on u.id = p.id_user
            ";

        if ($status != "T") {
            // dd($query." where status = :status");
            $pedidos = DB::select($query . " where status = ?", [$status]);
        } else {
            $pedidos = DB::select($query);
        }

        return view('admin.pedidos.index')->with('pedidos', $pedidos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TbPedido  $tbPedido
     * @return \Illuminate\Http\Response
     */
    public function show($idPedido)
    {
        $p = TbPedido::findOrFail($idPedido);
        $cliente = User::findOrFail($p->id_user);
        $status = "";
        
        $vlTotalPedido = 0;
        $produtosPedido = $p->getProdutosPedido()->get();


        $arrayProdutos = [];
        foreach ($produtosPedido as $pp) {
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

        switch($p->status){
            case 'N':
                $status = 'Novo';
                break;
            case 'E':
                $status = 'Entregue';
            case 'C': 
                $status = 'Cancelado';
        };
        
        $arrayDetalhesPedidos = ([
            'id_pedido' => $p->id,
            'valor_total' => $p->vlTotalPedido,
            'produtos' => $arrayProdutos,
            'status' => $status,
            'observacao' => $p->observacao, 
            'cliente' => $cliente->name,
            'email_cliente' => $cliente->email,
        ]);

        return view('admin.pedidos.show')->with('pedido', $arrayDetalhesPedidos);
        // dd($arrayDetalhesPedidos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TbPedido  $tbPedido
     * @return \Illuminate\Http\Response
     */
    public function edit(TbPedido $tbPedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TbPedido  $tbPedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TbPedido $tbPedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TbPedido  $tbPedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(TbPedido $tbPedido)
    {
        //
    }
}
