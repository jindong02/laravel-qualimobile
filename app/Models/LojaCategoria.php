<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LojaCategoria extends Model
{

    public $timestamps = false;
    protected $fillable = [
        'nome',
    ];
    protected $table = 'lojacategoria';

    public function Banner()
    {
        return $this->hasMany(Banner::class, 'id_categoria', 'id');
    }

    public function Produtos()
    {
        return $this->hasMany(LojaProduto::class, 'id_categoria', 'id');
    }

    public function Subcategoria()
    {
        return $this->hasMany(LojaSubcategoria::class, 'id_categoria', 'id');
    }
}
