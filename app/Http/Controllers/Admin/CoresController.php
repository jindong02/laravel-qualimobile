<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Cores;
use Image;

class CoresController extends Controller
{

    public function Listar()
    {

        Paginator::useBootstrap();

        return view('admin.cor.cores', ['cores' => Cores::orderBy('id', 'DESC')->paginate(10)]);
    }

    public function EditarCor($id)
    {
        return view('admin.cor.cor_editar', ['cor' => Cores::find($id)]);
    }

    public function ExcluirCor($id)
    {
        Cores::find($id)->delete();

        return redirect()->route('admin.cores')->with('success', 'Cor excluida com sucesso');
    }

    public function NovaCor()
    {
        return view('admin.cor.cor_nova');
    }

    public function Post(Request $request)
    {

        $cor = Cores::firstOrNew(array('id' => $request->id));

        $request->validate([
            'id' => 'required',
            'nome' => 'required',
            'imagem' => 'image|mimes:png,jpg,jpeg,webp|max:60000',
        ]);

        $cor->nome = $request->nome;

        if ($request->file('imagem')) {

            $img = Image::make($request->file('imagem'));

            $img->fit(47, 47);

            $img->orientate();

            $img->encode('webp', 90);

            $nomeImagem = md5(uniqid(rand(), true)) . '.webp';

            $img->save(storage_path('app/public/cores/' . $nomeImagem));

            $cor->imagem = $nomeImagem;
        }

        $cor->save();

        if ($request->id == 0) {
            return redirect()->route('admin.cor.add')->with('success', 'Cor cadastrado com sucesso');
        }
        return redirect()->route('admin.cor.editar', $request->id)->with('success', 'Cor atualizada com sucesso');
    }
}
