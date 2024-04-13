<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Revestimentos;
use Image;

class RevestimentoController extends Controller
{

    public function Listar()
    {

        Paginator::useBootstrap();

        return view('admin.revestimento.revestimentos', ['revestimentos' => Revestimentos::orderBy('id', 'DESC')->paginate(10)]);
    }

    public function EditarRevestimento($id)
    {
        return view('admin.revestimento.revestimento_editar', ['revestimento' => Revestimentos::find($id)]);
    }

    public function ExcluirRevestimento($id)
    {
        Revestimentos::find($id)->delete();

        return redirect()->route('admin.revestimentos')->with('success', 'Revestimento excluido com sucesso');
    }

    public function NovaRevestimento()
    {
        return view('admin.revestimento.revestimento_novo');
    }

    public function Post(Request $request)
    {

        $revestimento = Revestimentos::firstOrNew(array('id' => $request->id));

        $request->validate([
            'id' => 'required',
            'nome' => 'required',
            'categoria' => 'required',
            'imagem' => 'image|mimes:png,jpg,jpeg,webp|max:60000',
        ]);

        $revestimento->nome = $request->nome;
        $revestimento->categoria = $request->categoria;

        if ($request->file('imagem')) {

            $img = Image::make($request->file('imagem'));

            $img->fit(47, 47);

            $img->orientate();

            $img->encode('webp', 90);

            $nomeImagem = md5(uniqid(rand(), true)) . '.webp';

            $img->save(storage_path('app/public/revestimentos/' . $nomeImagem));

            $revestimento->imagem = $nomeImagem;
        }

        $revestimento->save();

        if ($request->id == 0) {
            return redirect()->route('admin.revestimento.add')->with('success', 'Revestimento cadastrado com sucesso');
        }
        return redirect()->route('admin.revestimento.editar', $request->id)->with('success', 'Revestimento atualizado com sucesso');
    }
}
