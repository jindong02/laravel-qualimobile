<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ProdutosDetalhesController;
use App\Http\Controllers\PoliticaController;
use App\Http\Controllers\CasesController;
use App\Http\Controllers\Core;

use App\Http\Controllers\LojaProdutosController;
use App\Http\Controllers\LojaProdutosDetalhesController;
/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */
//Route::get('/download', [Core::class, 'Download']);

Route::get('/manifest.webmanifest', [Core::class, 'Manifest']);

Route::middleware(['site', 'lang'])->group(function () {

    Route::get('/', [SiteController::class, 'Index'])->name('index');
    Route::get('/loja', [SiteController::class, 'loja'])->name('loja');
    Route::post('/newsletter', [SiteController::class, 'Newsletter'])->name('newsletter');
    Route::get('/historia', [SiteController::class, 'Historia'])->name('historia');
    Route::get('/contato', [SiteController::class, 'Contato'])->name('contato');
    Route::post('/contatoPost', [SiteController::class, 'ContatoPost'])->name('ContatoPost');
    Route::post('/orcamentoPost', [SiteController::class, 'OrcamentoPost'])->name('OrcamentoPost');
    Route::get('/confirmacao-contato', [SiteController::class, 'ConfirmacaoContato'])->name('ConfirmacaoContato');

    Route::get('/produtos/{main?}/{sub?}', [ProdutosController::class, 'ProdutosController'])->name('produtos');
    Route::post('/produtos', [ProdutosController::class, 'BuscarController']);

    Route::resource('cases', CasesController::class)->only(['index', 'show']);

    Route::get('/blog', [SiteController::class, 'Blog'])->name('blog');
    Route::get('/blog/{slug}', [SiteController::class, 'BlogDetalhes'])->name('blog.detalhes');

    Route::get('/produtos/r/{id?}', [ProdutosController::class, 'RemoverCategoriaController'])->name('produtos.remove');
    Route::get('/produtos/{id}', [ProdutosController::class, 'AdicionarCategoriaController'])->name('produtos.add');

    Route::get('/produto/{slug}', [ProdutosDetalhesController::class, 'ProdutoController'])->name('produto');

    Route::get('/politica-devolucao', [PoliticaController::class, 'Devolucao'])->name('politica.devolucao');
    Route::get('/politica-troca', [PoliticaController::class, 'Troca'])->name('politica.troca');
    Route::get('/politica-envio', [PoliticaController::class, 'Envio'])->name('politica.envio');
    Route::get('/politica-privacidade', [PoliticaController::class, 'Privacidade'])->name('politica.privacidade');
    
    //-----------------------------------------------------------------
    Route::get('/loja/lojaprodutos/{main?}/{sub?}', [LojaProdutosController::class, 'ProdutosController'])->name('lojaprodutos');
    Route::post('/loja/lojaprodutos', [LojaProdutosController::class, 'BuscarController']);

    Route::get('/loja/lojaprodutos/r/{id?}', [LojaProdutosController::class, 'RemoverCategoriaController'])->name('lojaprodutos.remove');
    Route::get('/loja/lojaprodutos/{id}', [LojaProdutosController::class, 'AdicionarCategoriaController'])->name('lojaprodutos.add');

    Route::get('/loja/lojaproduto/{slug}', [LojaProdutosDetalhesController::class, 'ProdutoController'])->name('lojaproduto');

});

require __DIR__ . '/auth.php';
