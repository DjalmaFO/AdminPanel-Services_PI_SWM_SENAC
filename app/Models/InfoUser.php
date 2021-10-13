<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'sobrenome' => 'string',
        'cep' => 'string|size:8',
        'endereco' => 'string',
        'numero' => 'string',
        'complemento' => 'string',
        'bairro' => 'string',
        'cidade' => 'string',
        'estado' => 'string',
    ];
}
