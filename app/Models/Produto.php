<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Config;

class Produto extends Model
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
    ];
    protected $casts = [
        'id_cores' => 'array',
        'id_revestimentos' => 'array',
        'imagem' => 'array',
    ];
    protected $table = 'Produto';

    public function Categoria()
    {
        return $this->hasOne(Categoria::class, 'id', 'id_categoria');
    }

    public function Subcategoria()
    {
        return $this->hasOne(Subcategoria::class, 'id', 'id_sub_categoria');
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
