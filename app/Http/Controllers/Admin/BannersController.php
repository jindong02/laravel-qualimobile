<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Banner;
use Image;

class BannersController extends Controller {

    public function Listar() {

        Paginator::useBootstrap();

        return view('admin.banner.banners', ['banners' => Banner::orderBy('id', 'DESC')->paginate(10)]);
    }

    public function EditarBanner($id) {
        return view('admin.banner.banner_editar', ['banner' => Banner::find($id)]);
    }

    public function ExcluirBanner($id) {
        Banner::find($id)->delete();

        return redirect()->route('admin.banners')->with('success', 'Banner excluido com sucesso');
    }

    public function NovaBanner() {
        return view('admin.banner.banner_novo');
    }

    public function Post(Request $request) {

        $banner = Banner::firstOrNew(array('id' => $request->id));

        $request->validate([
            'imagem' => 'image|mimes:png,jpg,jpeg,webp|max:20000',
        ]);

        $banner->id_categoria = $request->id_categoria;
        $banner->titulo = $request->titulo;
        $banner->descricao = $request->descricao;
        $banner->link = $request->link;

        if ($request->file('imagem')) {

            $img = Image::make($request->file('imagem'));

            $img->resize(null, 1080, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->encode('webp', 90);

            $nomeImagem = md5(uniqid(rand(), true)) . '.webp';

            $img->save(storage_path('app/public/banners/' . $nomeImagem));

            $banner->imagem = $nomeImagem;
        }

        $banner->save();

        if ($request->id == 0) {
            return redirect()->route('admin.banner.add')->with('success', 'Banner cadastrado com sucesso');
        }
        return redirect()->route('admin.banner.editar', $request->id)->with('success', 'Banner atualizado com sucesso');
    }

}
