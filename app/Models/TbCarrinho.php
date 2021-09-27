<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TbProdutoCarrinho;

class TbCarrinho extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
    ];

    public function getProdutosCarrinho(){
        return $this->hasMany(TbProdutoCarrinho::class, 'id_carrinho', 'id');
    }

}
