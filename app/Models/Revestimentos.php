<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Revestimentos extends Model
{

    public $timestamps = false;
    protected $fillable = [
        'id',
        'nome',
        'categoria',
        'imagem',
    ];
    protected $table = 'Revestimentos';
}
