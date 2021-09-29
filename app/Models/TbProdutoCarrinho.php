<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class TbProdutoCarrinho extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_carrinho',
        'id_produto',
        'qtd_produto',
    ];

    public function getProdutos(){
        return $this->hasMany(Produto::class, 'id', 'id_produto');
    }
}
