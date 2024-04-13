<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configuracoes;

class PoliticaEnvioController extends Controller
{

    public function index()
    {
        return view('admin.politica.envio', ['config' => Configuracoes::first()]);
    }

    public function store(Request $request)
    {

        $config = Configuracoes::first();

        $request->validate([
            'politica_envio' => 'required'
        ]);

        $config->politica_envio = $request->politica_envio;

        $config->save();

        return redirect()->back()->with('success', 'Dados alterado com sucesso');
    }
}
