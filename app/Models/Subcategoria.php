<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{

    public $timestamps = false;
    protected $fillable = [
        'id',
        'id_categoria',
        'nome',
    ];
    protected $table = 'Subcategoria';

    public function Categoria()
    {
        return $this->hasOne(Categoria::class, 'id', 'id_categoria');
    }

    public function Produto()
    {
        return $this->hasMany(Produto::class, 'id_sub_categoria', 'id');
    }
}
