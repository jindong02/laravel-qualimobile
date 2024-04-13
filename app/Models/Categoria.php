<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{

    public $timestamps = false;
    protected $fillable = [
        'nome',
    ];
    protected $table = 'Categoria';

    public function Banner()
    {
        return $this->hasMany(Banner::class, 'id_categoria', 'id');
    }

    public function Produtos()
    {
        return $this->hasMany(Produto::class, 'id_categoria', 'id');
    }

    public function Subcategoria()
    {
        return $this->hasMany(Subcategoria::class, 'id_categoria', 'id');
    }
}
