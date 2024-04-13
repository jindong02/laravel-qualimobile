<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\lojaCategoria;
use App\Models\LojaSubcategoria;

class LojaSubcategoriasController extends Controller {

    public function Listar() {

        Paginator::useBootstrap();

        return view('admin.lojasubcategoria.subcategorias', ['subcategorias' => LojaSubcategoria::orderBy('id', 'DESC')->paginate(10)]);
    }

    public function EditarSubcategoria($id) {
        return view('admin.lojasubcategoria.subcategoria_editar', ['subcategoria' => LojaSubcategoria::find($id)]);
    }

    public function ExcluirSubcategoria($id) {
        LojaSubcategoria::find($id)->delete();

        return redirect()->route('admin.lojasubcategorias')->with('success', 'Subcategoria excluida com sucesso');
    }

    public function NovaSubcategoria() {
        return view('admin.lojasubcategoria.subcategoria_nova');
    }

    public function Post(Request $request) {

        $categoria = LojaSubcategoria::firstOrNew(array('id' => $request->id));

        $request->validate([
            'id_categoria' => 'required',
            'nome' => 'required',
        ]);

        $categoria->id_categoria = $request->id_categoria;
        $categoria->nome = $request->nome;

        $categoria->save();

        if ($request->id == 0) {
            return redirect()->route('admin.lojasubcategoria.add')->with('success', 'Subcategoria cadastrado com sucesso');
        }
        return redirect()->route('admin.lojasubcategoria.editar', $request->id)->with('success', 'Subcategoria atualizada com sucesso');
    }

}
