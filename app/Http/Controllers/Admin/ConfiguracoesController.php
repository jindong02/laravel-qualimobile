<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configuracoes;
use Image;

class ConfiguracoesController extends Controller {

    public function Configuracoes() {

        return view('admin.configuracoes', ['config' => Configuracoes::first()]);
    }

    public function AtualizarConfiguracoes(Request $request) {

        $config = Configuracoes::first();

        $request->validate([
            'nome_site' => 'required',
            'descricao' => 'required',
            'keywords' => 'required|string',
            'telefone' => 'required',
            'email' => 'required',
            'cidade' => 'required',
            'endereco' => 'required',
            'catalogo' => 'mimes:pdf',
            'whatsapp' => 'required',
            'instagram' => 'required|string',
            'youtube' => 'required|string',
            'pinterest' => 'required|string',
            'tiny' => 'required|string'
        ]);

        if ($request->file('catalogo')) {

            $catalogo = $request->file('catalogo');

            $nomeCatalogo = md5(uniqid(rand(), true)) . '.' . $catalogo->extension();

            $catalogo->storeAs('public/', $nomeCatalogo);

            $config->catalogo = $nomeCatalogo;
        }


        $config->nome_site = $request->nome_site;
        $config->descricao = $request->descricao;
        $config->keywords = $request->keywords;

        $config->telefone = $request->telefone;
        $config->email = $request->email;
        $config->cidade = $request->cidade;
        $config->endereco = $request->endereco;

        $config->whatsapp = $request->whatsapp;
        $config->instagram = $request->instagram;
        $config->youtube = $request->youtube;
        $config->pinterest = $request->pinterest;
        $config->tiny = $request->tiny;
        $config->save();

        return redirect()->route('admin.configuracoes')->with('success', 'Dados alterado com sucesso');
    }

}
