<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Cases;
use Image;

class CasesController extends Controller
{

    public function Listar()
    {

        Paginator::useBootstrap();

        return view('admin.cases.cases', ['cases' => Cases::orderBy('id', 'DESC')->paginate(10)]);
    }

    public function EditarCase($id)
    {
        return view('admin.cases.editar', ['case' => Cases::find($id)]);
    }

    public function ExcluirCase($id)
    {
        Cases::find($id)->delete();

        return redirect()->route('admin.cases')->with('success', 'Publicação excluida com sucesso');
    }

    public function NovoCase()
    {
        return view('admin.cases.novo');
    }

    public function Post(Request $request)
    {

        $case = Cases::firstOrNew(array('id' => $request->id));

        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'imagem' => 'image|mimes:png,jpg,jpeg,webp|max:20000',
            'galeria.*' => 'image|mimes:png,jpg,jpeg,webp|max:28000',
        ]);

        if ($request->file('galeria')) {
            $galeria = [];

            foreach ($request->file('galeria') as $imagem) {

                $nomeImagem = md5(uniqid(rand(), true)) . '.webp';
                $img = Image::make($imagem)->orientate();

                $img->resize(1000, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('webp');

                $img->save(storage_path('app/public/cases/' . $nomeImagem));

                $galeria[] = $nomeImagem;
            }

            $case->galeria = $galeria;
        }

        $case->titulo = $request->titulo;
        $case->descricao = $request->descricao;

        if ($request->file('imagem')) {

            $img = Image::make($request->file('imagem'));

            $img->encode('webp');

            $nomeImagem = md5(uniqid(rand(), true)) . '.webp';

            $img->save(storage_path('app/public/cases/' . $nomeImagem));

            $case->imagem = $nomeImagem;
        }

        $case->save();

        if ($request->id == 0) {
            return redirect()->route('admin.case.add')->with('success', 'Case cadastrado com sucesso');
        }
        return redirect()->route('admin.case.editar', $request->id)->with('success', 'Case atualizado com sucesso');
    }
}
