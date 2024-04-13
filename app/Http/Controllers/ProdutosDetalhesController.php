<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Produto;

class ProdutosDetalhesController extends Controller {

    public function ProdutoController($slug) {
        $produto = Produto::where('slug', $slug)->first();
                        
        if ($produto) {
            return view('produto', [
                'produto' => $produto,
                'relacionados' => Produto::where('id', '!=', $produto->id)->inRandomOrder()->limit(5)->get(),
            ]);
        }

        return redirect()->route('produtos');
    }

}
