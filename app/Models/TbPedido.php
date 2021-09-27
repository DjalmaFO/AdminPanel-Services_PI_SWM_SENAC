<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbPedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'status',
        'observacao',
    ];


    public function getProdutosPedido(){
        return $this->hasMany(TbExplodeProdutosPedido::class, 'id_pedido', 'id');
    }
}
