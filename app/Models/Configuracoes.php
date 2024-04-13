<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Config;

class Configuracoes extends Model {

    public $timestamps = false;
    protected $fillable = [
        'nome_site',
        'descricao',
        'keywords',
        'favicon',
        'tiny',
    ];
    protected $table = 'Configuracoes';

}
