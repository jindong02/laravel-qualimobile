<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{

    const CREATED_AT = 'data';
    const UPDATED_AT = null;
    protected $fillable = [
        'id',
        'titulo',
        'descricao',
        'imagem',
        'galeria',
    ];
    protected $casts = [
        'galeria' => 'array',
    ];
    protected $table = 'Cases';
}
