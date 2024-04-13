<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Config;

class LojaProduto extends Model
{

    use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;

    public $timestamps = false;
    protected $fillable = [
        'slug',
        'id_categoria',
        'id_sub_categoria',
        'id_cores',
        'id_revestimentos',
        'nome',
        'descricao',
        'imagem',
        'sketchup',
        'youtube',
        'tecnico',
        'certificacoes',
        'preço'
    ];
    protected $casts = [
        'id_cores' => 'array',
        'id_revestimentos' => 'array',
        'imagem' => 'array',
    ];
    protected $table = 'lojaproduto';

    public function LojaCategoria()
    {
        return $this->hasOne(LojaCategoria::class, 'id', 'id_categoria');
    }

    public function LojaSubcategoria()
    {
        return $this->hasOne(LojaSubcategoria::class, 'id', 'id_sub_categoria');
    }

    public function Cores()
    {
        return $this->belongsToJson(Cores::class, 'id_cores', 'id');
    }

    public function Revestimentos()
    {
        return $this->belongsToJson(Revestimentos::class, 'id_revestimentos', 'id');
    }
}
