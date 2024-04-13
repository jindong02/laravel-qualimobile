<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Subcategoria;

class SubcategoriasController extends Controller {

    public function Listar() {

        Paginator::useBootstrap();

        return view('admin.subcategoria.subcategorias', ['subcategorias' => Subcategoria::orderBy('id', 'DESC')->paginate(10)]);
    }

    public function EditarSubcategoria($id) {
        return view('admin.subcategoria.subcategoria_editar', ['subcategoria' => Subcategoria::find($id)]);
    }

    public function ExcluirSubcategoria($id) {
        Subcategoria::find($id)->delete();

        return redirect()->route('admin.subcategorias')->with('success', 'Subcategoria excluida com sucesso');
    }

    public function NovaSubcategoria() {
        return view('admin.subcategoria.subcategoria_nova');
    }

    public function Post(Request $request) {

        $categoria = Subcategoria::firstOrNew(array('id' => $request->id));

        $request->validate([
            'id_categoria' => 'required',
            'nome' => 'required',
        ]);

        $categoria->id_categoria = $request->id_categoria;
        $categoria->nome = $request->nome;

        $categoria->save();

        if ($request->id == 0) {
            return redirect()->route('admin.subcategoria.add')->with('success', 'Subcategoria cadastrado com sucesso');
        }
        return redirect()->route('admin.subcategoria.editar', $request->id)->with('success', 'Subcategoria atualizada com sucesso');
    }

}
