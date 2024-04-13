<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Subcategoria;
use App\Models\Menu;
use App\Models\Submenu;
use Illuminate\Pagination\Paginator;

class ProdutosController extends Controller
{

    public function ProdutosController(Request $request)
    {
        Paginator::defaultView('layouts.paginacao');

        if ($request->sub) {
            $submenu = Submenu::where('slug', $request->sub)->first();
            $categoria = $submenu->categoria->first();
            $subcategorias = $submenu->subcategorias;
        } else if ($request->main) {
            $menu = Menu::where('slug', $request->main)->first();
            $categoria = $menu->categoria->first();

            if (! $categoria) {
                $oneSubmenu = $menu->submenus->first();
                if ($oneSubmenu) {
                    $categoria = $oneSubmenu->categoria->first();
                }
            }
            $subcategorias = $menu->subcategorias;
        } else {
            $categoria = null;
            $subcategorias = null;
        }
        
        $produtos = Produto::where(function ($query) use ($request, $categoria, $subcategorias) {
             
            if ($request->q) {
                foreach (explode(" ", $request->q) as $search) {
                    $query->where('nome', 'LIKE', '%' . $search . '%');
                }
            }
            // else {
                if ($subcategorias && !$subcategorias->isEmpty()) {
                    $query->whereIn('id_sub_categoria', $subcategorias->pluck('id')->all());
                } else if ($categoria) {
                    $query->where('id_categoria', $categoria->id);
                }
            // }
        });
        
        return view('produtos', [
            //'categoria' => $categoria,
            //'subcategorias' => $subcategorias,
            'produtos' => $produtos->orderBy('id', 'DESC')->paginate(24)->withQueryString(),
        ]);
    }

    public function BuscarController(Request $Request)
    {
        Session::put('Categoria', $Request->categoria);
        return redirect()->route('produtos');
    }

    public function AdicionarCategoriaController($id_categoria, $id_sub_categoria = false)
    {
        if ($id_categoria > 0) {
            Session::put('Categoria', [$id_categoria]);

            if ($id_sub_categoria !== false) {
                Session::put('Subcategoria', [$id_sub_categoria]);
            }
        } else {
            Session::forget('Categoria');
            Session::forget('Subcategoria');
        }
        return redirect()->route('produtos');
    }

    public function RemoverCategoriaController($id = false)
    {

        if ($id !== false && Session::get('Categoria')) {
            $categoria = Session::get('Categoria');

            unset($categoria[array_search($id, $categoria)]);

            Session::put('Categoria', $categoria);
        } else {
            Session::forget('Categoria');
        }

        return redirect()->route('produtos');
    }
}
