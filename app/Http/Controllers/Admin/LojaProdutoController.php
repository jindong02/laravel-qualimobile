<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\LojaProduto;
use App\Models\LojaCategoria;
use Intervention\Image\Facades\Image;

class LojaProdutoController extends Controller
{

    public function Listar()
    {

        Paginator::useBootstrap();

        return view('admin.lojaproduto.produtos', ['produtos' => lojaProduto::orderBy('id', 'DESC')->paginate(10)]);
    }

    public function EditarProduto($id)
    {
        return view('admin.lojaproduto.produto_editar', ['produto' => lojaProduto::find($id)]);
    }

    public function ExcluirProduto($id)
    {
        LojaProduto::find($id)->delete();

        return redirect()->route('admin.lojaprodutos')->with('success', 'Produto excluido com sucesso');
    }

    public function NovoProduto()
    {
        return view('admin.lojaproduto.produto_novo');
    }

    public function LojaSubCategoria($id_categoria)
    {
        $categoria = LojaCategoria::find($id_categoria);

        if ($categoria) {
            return $categoria->Subcategoria()->select(['id', 'nome'])->get();
        }
    }

    public function Post(Request $request)
    {

        $produto = lojaProduto::firstOrNew(array('id' => $request->id));

        $request->validate([
            'nome' => 'required',
            'preço' => 'required',
            'descricao' => 'required',
            'id_categoria' => 'required',
            'id_sub_categoria' => 'required',
            'tecnico' => 'required',
            "id_cores" => "array|distinct",
            "id_revestimentos" => "array|distinct",
            'imagem.*' => 'image|mimes:png,jpg,jpeg,webp|max:28000',
        ]);

        if ($request->file('imagem')) {
            $imagens = [];

            foreach ($request->file('imagem') as $imagem) {

                $nomeImagem = md5(uniqid(rand(), true)) . '.webp';
                $img = Image::make($imagem)->orientate();

                $img->resize(null, 1500, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->encode('webp', 90);

                $img->save(storage_path('app/public/produtos/' . $nomeImagem));

                $imagens[] = $nomeImagem;
            }

            $produto->imagem = $imagens;
        }

        if ($request->file('sketchup')) {

            $sketchup = $request->file('sketchup');

            $nomeSketchup = md5(uniqid(rand(), true)) . '.skp';

            $sketchup->storeAs('public/produtos', $nomeSketchup);

            $produto->sketchup = $nomeSketchup;
        }

        if ($request->file('certificacoes')) {

            $certificacoes = $request->file('certificacoes');

            $nomeCertificacoes = md5(uniqid(rand(), true)) . '.webp';

            $certificacoes->storeAs('public/certificacoes', $nomeCertificacoes);

            $produto->certificacoes = $nomeCertificacoes;
        }

        $produto->nome = $request->nome;

        if ($request->id == 0) {
            $produto->slug = Str::slug($request->nome . ' ' . rand(), '-');
        }

        $produto->descricao = $request->descricao;
        $produto->tecnico = $request->tecnico;
        $produto->youtube = preg_replace("/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i", "$2", $request->youtube);
        $produto->id_categoria = $request->id_categoria;
        $produto->id_sub_categoria = $request->id_sub_categoria;
        $produto->id_cores = $request->id_cores;
        $produto->id_revestimentos = $request->id_revestimentos;
        $produto->preço = $request->preço;

        $produto->save();

        if ($request->id == 0) {
            return redirect()->route('admin.lojaproduto.add')->with('success', 'Produto cadastrado com sucesso');
        }
        return redirect()->route('admin.lojaproduto.editar', $request->id)->with('success', 'Produto atualizada com sucesso');
    }
}
