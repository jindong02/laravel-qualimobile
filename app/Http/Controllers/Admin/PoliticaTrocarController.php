<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configuracoes;

class PoliticaTrocarController extends Controller
{

    public function index()
    {
        return view('admin.politica.troca', ['config' => Configuracoes::first()]);
    }

    public function store(Request $request)
    {

        $config = Configuracoes::first();

        $request->validate([
            'politica_troca' => 'required'
        ]);

        $config->politica_troca = $request->politica_troca;

        $config->save();

        return redirect()->back()->with('success', 'Dados alterado com sucesso');
    }
}
