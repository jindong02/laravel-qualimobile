<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Blog;
use Image;

class BlogController extends Controller
{

    public function Listar()
    {

        Paginator::useBootstrap();

        return view('admin.blog.blogs', ['blogs' => Blog::orderBy('id', 'DESC')->paginate(10)]);
    }

    public function EditarBlog($id)
    {
        return view('admin.blog.editar', ['blog' => Blog::find($id)]);
    }

    public function ExcluirBlog($id)
    {
        Blog::find($id)->delete();

        return redirect()->route('admin.blogs')->with('success', 'Publicação excluida com sucesso');
    }

    public function NovoBlog()
    {
        return view('admin.blog.novo');
    }

    public function Post(Request $request)
    {

        $blog = Blog::firstOrNew(array('id' => $request->id));

        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'imagem' => 'image|mimes:png,jpg,jpeg,webp|max:20000',
        ]);

        if ($request->id == 0) {
            $blog->slug = Str::slug($request->titulo . ' ' . rand(), '-');
        }

        $blog->id_admin = Auth()->user()->id;

        $blog->titulo = $request->titulo;
        $blog->descricao = $request->descricao;

        if ($request->file('imagem')) {

            $img = Image::make($request->file('imagem'));

            $img->resize(475, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->encode('webp', 90);

            $nomeImagem = md5(uniqid(rand(), true)) . '.webp';

            $img->save(storage_path('app/public/blog/' . $nomeImagem));

            $blog->imagem = $nomeImagem;
        }

        $blog->save();

        if ($request->id == 0) {
            return redirect()->route('admin.blog.add')->with('success', 'Publicação efetuada com sucesso');
        }
        return redirect()->route('admin.blog.editar', $request->id)->with('success', 'Publicação atualizado com sucesso');
    }
}
