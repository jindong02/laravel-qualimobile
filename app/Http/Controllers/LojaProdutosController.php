<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\LojaProduto;
use App\Models\LojaCategoria;
use App\Models\lojaSubcategoria;
use App\Models\LojaMenu;
use App\Models\LojaSubmenu;
use Illuminate\Pagination\Paginator;

class LojaProdutosController extends Controller
{
    public function ProdutosController(Request $request)
    {        
        Paginator::defaultView('loja_layouts.paginacao');
        if ($request->sub) {
            $submenu = LojaSubmenu::where('slug', $request->sub)->first();
            $categoria = $submenu->categoria->first()?$submenu->categoria->first():[];
            $subcategorias = $submenu->subcategorias;
        } else if ($request->main) {
            $menu = LojaMenu::where('slug', $request->main)->first();
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
        
        $produtos = LojaProduto::where(function ($query) use ($request, $categoria, $subcategorias) {
            
            if ($request->q) {
                foreach (explode(" ", $request->q) as $search) {
                    $query->where('nome', 'LIKE', '%' . $search . '%');
                }
            }
           
            if ($subcategorias && !$subcategorias->isEmpty()) {                
                $query->whereIn('id_sub_categoria', $subcategorias->pluck('id')->all());
            } else if ($categoria) {
                $query->where('id_categoria', $categoria->id);
            }
        });
        //var_dump( $request->main); die();
       
        return view('lojaprodutos', [
            'produtos' => $produtos->orderBy('id', 'DESC')->paginate(24)->withQueryString(),
            'mainmenu' => $request->main,
            'mainsubmenu' => $request->sub,
        ]);
    }

    public function BuscarController(Request $Request)
    {
        Session::put('LojaCategoria', $Request->categoria);
        return redirect()->route('lojaprodutos');
    }

    public function AdicionarCategoriaController($id_categoria, $id_sub_categoria = false)
    {
        if ($id_categoria > 0) {
            Session::put('LojaCategoria', [$id_categoria]);

            if ($id_sub_categoria !== false) {
                Session::put('LojaSubcategoria', [$id_sub_categoria]);
            }
        } else {
            Session::forget('LojaCategoria');
            Session::forget('LojaSubcategoria');
        }
        return redirect()->route('lojaprodutos');
    }

    public function RemoverCategoriaController($id = false)
    {

        if ($id !== false && Session::get('LojaCategoria')) {
            $categoria = Session::get('LojaCategoria');

            unset($categoria[array_search($id, $categoria)]);

            Session::put('LojaCategoria', $categoria);
        } else {
            Session::forget('LojaCategoria');
        }

        return redirect()->route('lojaprodutos');
    }
}
