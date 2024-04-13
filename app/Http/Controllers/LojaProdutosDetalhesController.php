<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\LojaProduto;

class LojaProdutosDetalhesController extends Controller {

    public function ProdutoController($slug) {
        $produto = LojaProduto::where('slug', $slug)->first();
                        
        if ($produto) {
            return view('lojaproduto', [
                'produto' => $produto,
                'relacionados' => LojaProduto::where('id', '!=', $produto->id)->inRandomOrder()->limit(5)->get(),
            ]);
        }

        return redirect()->route('lojaprodutos');
    }

}
