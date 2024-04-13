<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Menu extends Model
{
    use Sortable;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]|bool
     */
    protected $guarded = ['id'];

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
        return $this->belongsToMany(Categoria::class, 'menu_categoria');
    }

    public function subcategorias()
    {
        return $this->belongsToMany(Subcategoria::class, 'menu_subcategoria');
    }

    public function submenus()
    {
        return $this->hasMany(Submenu::class);
    }
}
