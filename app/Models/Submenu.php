<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Submenu extends Model
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

    public function mainmenu()
    {
        return $this->belongsTo(Menu::class, 'menu_id');
    }

    public function categoria()
    {
        return $this->belongsToMany(Categoria::class, 'submenu_categoria');
    }

    public function subcategorias()
    {
        return $this->belongsToMany(Subcategoria::class, 'submenu_subcategoria');
    }

    public function scopeFilters($query, array $filters)
    {
        if (isset($filters['menu_principal']) && $filters['menu_principal']) {
            $query->where('menu_id', $filters['menu_principal']);
        }

        if (isset($filters['nome_submenu']) && $filters['nome_submenu']) {
            $query->whereRaw("LOWER(name) LIKE '%" . strtolower($filters['nome_submenu']) . "%'");
        }

        if (isset($filters['descricao']) && $filters['descricao']) {
            $query->whereRaw("LOWER(description) LIKE '%" . strtolower($filters['descricao']) . "%'");
        }
    }
}
