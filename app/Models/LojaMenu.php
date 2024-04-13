<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class LojaMenu extends Model
{
    use Sortable;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]|bool
     */
    protected $guarded = ['id'];

    protected $fillable = [
    ];

    protected $table = 'lojamenus';
    /**
     * Define the attributes that are sortable.
     */
    public $sortable = [
        'name',
    ];

    public function scopeSearch($query, $search)
    {
        $query->whereRaw("LOWER(name) LIKE '%" . strtolower($search) . "%'");
    }

    public function categoria()
    {
        return $this->belongsToMany(LojaCategoria::class, 'lojamenu_lojacategoria','menu_id','categoria_id');
    }

    public function subcategorias()
    {
        return $this->belongsToMany(LojaSubcategoria::class, 'lojamenu_lojasubcategoria','menu_id','subcategoria_id');
    }

    public function submenus()
    {
        return $this->hasMany(LojaSubmenu::class, 'menu_id');
    }
}
