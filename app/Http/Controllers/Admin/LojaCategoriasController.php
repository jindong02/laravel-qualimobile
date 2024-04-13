<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\LojaCategoria;
use Intervention\Image\Facades\Image;

class LojaCategoriasController extends Controller {

    public function Listar() {

        Paginator::useBootstrap();

        return view('admin.lojacategoria.categorias', ['categorias' => LojaCategoria::orderBy('id', 'DESC')->paginate(10)]);
    }

    public function EditarCategoria($id) {
        return view('admin.lojacategoria.categoria_editar', ['categoria' => LojaCategoria::find($id)]);
    }

    public function ExcluirCategoria($id) {
        LojaCategoria::find($id)->delete();

        return redirect()->route('admin.lojacategorias')->with('success', 'Categoria excluida com sucesso');
    }

    public function NovaCategoria() {
        return view('admin.lojacategoria.categoria_nova');
    }

    public function Post(Request $request) {

        $categoria = LojaCategoria::firstOrNew(array('id' => $request->id));

        $request->validate([
            'nome' => 'required',
            'imagem' => 'image|mimes:png,jpg,jpeg,webp|max:60000',
        ]);

        $categoria->nome = $request->nome;


        if ($request->file('imagem')) {

            $img = Image::make($request->file('imagem'));

            $img->fit(475, 341);

            $img->orientate();

            $img->encode('webp', 90);

            $nomeImagem = md5(uniqid(rand(), true)) . '.webp';

            $img->save(storage_path('app/public/categorias/' . $nomeImagem));

            $categoria->imagem = $nomeImagem;
        }

        $categoria->save();

        if ($request->id == 0) {
            return redirect()->route('admin.lojacategoria.add')->with('success', 'Categoria cadastrado com sucesso');
        }
        return redirect()->route('admin.lojacategoria.editar', $request->id)->with('success', 'Categoria atualizada com sucesso');
    }

}
