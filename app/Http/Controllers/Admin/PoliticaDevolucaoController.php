<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configuracoes;
use Image;

class PoliticaDevolucaoController extends Controller
{

    public function index()
    {
        return view('admin.politica.devolucao', ['config' => Configuracoes::first()]);
    }

    public function store(Request $request)
    {

        $config = Configuracoes::first();

        $request->validate([
            'politica_devolucao' => 'required'
        ]);

        $config->politica_devolucao = $request->politica_devolucao;

        $config->save();

        return redirect()->back()->with('success', 'Dados alterado com sucesso');
    }
}
