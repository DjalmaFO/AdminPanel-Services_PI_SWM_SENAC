<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Categoria;

class Produto extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'nm_produto', 
        'desc_produto',
        'vl_produto',
        'id_categoria',
        'qtd_produto',
        'img_produto',
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class, 'id', 'id_categoria'); 
    }
}
