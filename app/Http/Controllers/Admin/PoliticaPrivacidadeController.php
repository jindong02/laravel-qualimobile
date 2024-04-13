<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configuracoes;

class PoliticaPrivacidadeController extends Controller
{

    public function index()
    {
        return view('admin.politica.privacidade', ['config' => Configuracoes::first()]);
    }

    public function store(Request $request)
    {

        $config = Configuracoes::first();

        $request->validate([
            'politica_privacidade' => 'required'
        ]);

        $config->politica_privacidade = $request->politica_privacidade;

        $config->save();

        return redirect()->back()->with('success', 'Dados alterado com sucesso');
    }
}
