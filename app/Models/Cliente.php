<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    public $timestamps = false;

    protected $fillable = [
        'id',
        'nome',
        'descricao',
        'empresa',
        'imagem',
    ];
    protected $table = 'Cliente';
}
