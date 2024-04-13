<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Intervention\Image\Facades\Image;

class CategoriasController extends Controller {

    public function Listar() {

        Paginator::useBootstrap();

        return view('admin.categoria.categorias', ['categorias' => Categoria::orderBy('id', 'DESC')->paginate(10)]);
    }

    public function EditarCategoria($id) {
        return view('admin.categoria.categoria_editar', ['categoria' => Categoria::find($id)]);
    }

    public function ExcluirCategoria($id) {
        Categoria::find($id)->delete();

        return redirect()->route('admin.categorias')->with('success', 'Categoria excluida com sucesso');
    }

    public function NovaCategoria() {
        return view('admin.categoria.categoria_nova');
    }

    public function Post(Request $request) {

        $categoria = Categoria::firstOrNew(array('id' => $request->id));

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
            return redirect()->route('admin.categoria.add')->with('success', 'Categoria cadastrado com sucesso');
        }
        return redirect()->route('admin.categoria.editar', $request->id)->with('success', 'Categoria atualizada com sucesso');
    }

}
