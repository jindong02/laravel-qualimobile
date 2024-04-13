<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cores extends Model
{

    public $timestamps = false;
    protected $fillable = [
        'id',
        'nome',
        'imagem',
    ];
    protected $table = 'Cores';
}
