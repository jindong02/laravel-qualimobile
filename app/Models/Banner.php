<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Config;

class Banner extends Model {

    public $timestamps = false;
    protected $fillable = [
        'titulo',
        'descricao',
        'imagem',
        'link',
    ];
    protected $table = 'Banner';

    public function Categoria() {
        return $this->hasOne(Categoria::class, 'id', 'id_categoria');
    }

}
