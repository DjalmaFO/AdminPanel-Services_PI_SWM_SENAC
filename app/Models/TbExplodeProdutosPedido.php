<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbExplodeProdutosPedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pedido',
        'id_produto',
        'qtd_produto',
        'vl_produto',
        'vl_frete',
    ];

    public function detalhesProdutoPedido(){
        return $this->hasOne(Produto::class, 'id', 'id_produto');
    }
}
