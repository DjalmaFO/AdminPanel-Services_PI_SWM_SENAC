<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbProdutoCarrinho extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_carrinho',
        'id_produto',
        'qtd_produto',
    ];
}
