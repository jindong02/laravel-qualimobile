<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PoliticaController extends Controller
{

    public function Devolucao()
    {
        return view('politica.devolucao');
    }

    public function Troca()
    {
        return view('politica.troca');
    }

    public function Envio()
    {
        return view('politica.envio');
    }

    public function Privacidade()
    {
        return view('politica.privacidade');
    }
}
