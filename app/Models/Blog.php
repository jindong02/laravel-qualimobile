<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    const CREATED_AT = 'data';
    const UPDATED_AT = null;
    protected $fillable = [
        'id',
        'slug',
        'titulo',
        'descricao',
        'imagem',
    ];
    protected $table = 'Blog';

    public function Admin()
    {
        return $this->hasOne(Admin::class, 'id', 'id_admin');
    }
}
