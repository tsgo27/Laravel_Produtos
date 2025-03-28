<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Api_produtos extends Model
{
    use HasFactory;

     // Nome correto da tabela
     protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'categoria',
        'validade',
        'valor',

    ];
}
