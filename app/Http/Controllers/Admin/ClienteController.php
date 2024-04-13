<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Image;

class ClienteController extends Controller
{

    public function Listar()
    {

        Paginator::useBootstrap();

        return view('admin.cliente.clientes', ['clientes' => Cliente::orderBy('id', 'DESC')->paginate(10)]);
    }

    public function EditarCliente($id)
    {
        return view('admin.cliente.editar', ['cliente' => Cliente::find($id)]);
    }

    public function ExcluirCliente($id)
    {
        Cliente::find($id)->delete();

        return redirect()->route('admin.cliente')->with('success', 'Cliente excluido com sucesso');
    }

    public function NovoCliente()
    {
        return view('admin.cliente.novo');
    }

    public function Post(Request $request)
    {

        $Cliente = Cliente::firstOrNew(array('id' => $request->id));

        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'imagem' => 'image|mimes:png,jpg,jpeg,webp|max:20000',
        ]);

        $Cliente->nome = $request->nome;
        $Cliente->descricao = $request->descricao;
        $Cliente->empresa = $request->empresa;

        if ($request->file('imagem')) {

            $img = Image::make($request->file('imagem'));

            $img->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img->encode('webp', 90);

            $nomeImagem = md5(uniqid(rand(), true)) . '.webp';

            $img->save(storage_path('app/public/clientes/' . $nomeImagem));

            $Cliente->imagem = $nomeImagem;
        }

        $Cliente->save();

        if ($request->id == 0) {
            return redirect()->route('admin.cliente.add')->with('success', 'Cliente cadastrado com sucesso');
        }

        return redirect()->route('admin.cliente.editar', $request->id)->with('success', 'Cliente atualizado com sucesso');
    }
}
