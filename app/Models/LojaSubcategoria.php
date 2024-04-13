<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LojaSubcategoria extends Model
{

    public $timestamps = false;
    protected $fillable = [
        'id',
        'id_categoria',
        'nome',
    ];
    protected $table = 'lojasubcategoria';

    public function Categoria()
    {
        return $this->hasOne(LojaCategoria::class, 'id', 'id_categoria');
    }

    public function Produto()
    {
        return $this->hasMany(LojaProduto::class, 'id_sub_categoria', 'id');
    }
}
