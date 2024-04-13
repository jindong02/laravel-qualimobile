<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\LojaCategoriasController;
use App\Http\Controllers\Admin\LojaSubcategoriasController;
use App\Http\Controllers\Admin\LojaProdutoController;
use App\Http\Controllers\Admin\LojaMenuController;
use App\Http\Controllers\Admin\LojaSubmenuController;


use App\Http\Controllers\Admin\AdminSessionController;
use App\Http\Controllers\Admin\ConfiguracoesController;
use App\Http\Controllers\Admin\ConfiguracoesAcessoController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\ProdutoController;
use App\Http\Controllers\Admin\CoresController;
use App\Http\Controllers\Admin\RevestimentoController;
use App\Http\Controllers\Admin\CategoriasController;
use App\Http\Controllers\Admin\SubcategoriasController;
use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CasesController;
use App\Http\Controllers\Admin\ClienteController;
use App\Http\Controllers\Admin\PoliticaTrocarController;
use App\Http\Controllers\Admin\PoliticaEnvioController;
use App\Http\Controllers\Admin\PoliticaDevolucaoController;
use App\Http\Controllers\Admin\PoliticaPrivacidadeController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\SubmenuController;

Route::prefix('admin')->middleware(['site'])->name('admin.')->group(function () {

    Route::middleware(['guest'])->group(function () {
        Route::get('/', [AdminSessionController::class, 'Login'])->name('login');
        Route::post('/', [AdminSessionController::class, 'FazerLogin']);
    });

    Route::middleware(['auth'])->group(function () {

        Route::get('/dashboard', [AdminSessionController::class, 'Dashboard'])->name('dashboard');

        Route::get('/configuracoes', [ConfiguracoesController::class, 'Configuracoes'])->name('configuracoes');
        Route::post('/configuracoes', [ConfiguracoesController::class, 'AtualizarConfiguracoes']);

        Route::get('/configuracoes/acesso', [ConfiguracoesAcessoController::class, 'Acesso'])->name('configuracoes.acesso');
        Route::post('/configuracoes/acesso', [ConfiguracoesAcessoController::class, 'AtualizarAcesso']);

        Route::resource('politica-devolucao', PoliticaDevolucaoController::class)->only(['index', 'store']);
        Route::resource('politica-troca', PoliticaTrocarController::class)->only(['index', 'store']);
        Route::resource('politica-envio', PoliticaEnvioController::class)->only(['index', 'store']);
        Route::resource('politica-privacidade', PoliticaPrivacidadeController::class)->only(['index', 'store']);

        Route::get('/newsletter', [NewsletterController::class, 'Newsletter'])->name('newsletter');
        Route::post('/newsletter', [NewsletterController::class, 'EnviarEmail']);

        Route::get('/produtos', [ProdutoController::class, 'Listar'])->name('produtos');
        Route::get('/produtos/excluir/{id}', [ProdutoController::class, 'ExcluirProduto'])->name('produto.excluir');
        Route::get('/produto/novo', [ProdutoController::class, 'NovoProduto'])->name('produto.add');
        Route::get('/produto/{id}', [ProdutoController::class, 'EditarProduto'])->name('produto.editar');
        Route::get('/produto/subcategoria/{id_categoria}', [ProdutoController::class, 'SubCategoria']);
        Route::Post('/produto/post', [ProdutoController::class, 'Post'])->name('produto.post');

        Route::get('/categorias', [CategoriasController::class, 'Listar'])->name('categorias');
        Route::get('/categorias/excluir/{id}', [CategoriasController::class, 'ExcluirCategoria'])->name('categoria.excluir');
        Route::get('/categoria/novo', [CategoriasController::class, 'NovaCategoria'])->name('categoria.add');
        Route::get('/categoria/{id}', [CategoriasController::class, 'EditarCategoria'])->name('categoria.editar');
        Route::Post('/categoria/post', [CategoriasController::class, 'Post'])->name('categoria.post');
        //-------------------------------------
        Route::get('/lojacategorias', [LojaCategoriasController::class, 'Listar'])->name('lojacategorias');
        Route::get('/lojacategorias/excluir/{id}', [LojaCategoriasController::class, 'ExcluirCategoria'])->name('lojacategoria.excluir');
        Route::get('/lojacategoria/novo', [LojaCategoriasController::class, 'NovaCategoria'])->name('lojacategoria.add');
        Route::get('/lojacategoria/{id}', [LojaCategoriasController::class, 'EditarCategoria'])->name('lojacategoria.editar');
        Route::Post('/lojacategoria/post', [LojaCategoriasController::class, 'Post'])->name('lojacategoria.post');

        Route::get('/lojasubcategorias', [LojaSubcategoriasController::class, 'Listar'])->name('lojasubcategorias');
        Route::get('/lojasubcategorias/excluir/{id}', [LojaSubcategoriasController::class, 'ExcluirSubcategoria'])->name('lojasubcategoria.excluir');
        Route::get('/lojasubcategoria/novo', [LojaSubcategoriasController::class, 'NovaSubcategoria'])->name('lojasubcategoria.add');
        Route::get('/lojasubcategoria/{id}', [LojaSubcategoriasController::class, 'EditarSubcategoria'])->name('lojasubcategoria.editar');
        Route::Post('/lojasubcategoria/post', [LojaSubcategoriasController::class, 'Post'])->name('lojasubcategoria.post');

        Route::get('/lojaprodutos', [LojaProdutoController::class, 'Listar'])->name('lojaprodutos');
        Route::get('/lojaprodutos/excluir/{id}', [LojaProdutoController::class, 'ExcluirProduto'])->name('lojaproduto.excluir');
        Route::get('/lojaproduto/novo', [LojaProdutoController::class, 'NovoProduto'])->name('lojaproduto.add');
        Route::get('/lojaproduto/{id}', [LojaProdutoController::class, 'EditarProduto'])->name('lojaproduto.editar');
        Route::get('/lojaproduto/subcategoria/{id_categoria}', [LojaProdutoController::class, 'lojaSubCategoria']);
        Route::Post('/lojaproduto/post', [LojaProdutoController::class, 'Post'])->name('lojaproduto.post');
        
        Route::get('/lojamenus', [LojaMenuController::class, 'index'])->name('lojamenus.index');
        Route::post('/lojamenus/store', [LojaMenuController::class, 'store'])->name('lojamenus.store');
        Route::get('/lojamenus/crio', [LojaMenuController::class, 'create'])->name('lojamenus.create');
        Route::get('/lojamenus/{menu}/editar', [LojaMenuController::class, 'edit'])->name('lojamenus.edit');
        Route::put('/lojamenus/{menu}/update', [LojaMenuController::class, 'update'])->name('lojamenus.update');
        Route::delete('/lojamenus/{menu}/destroy', [LojaMenuController::class, 'destroy'])->name('lojamenus.destroy');
        Route::get('/lojamenus/rearrange', [LojaMenuController::class, 'rearrange'])->name('lojamenus.rearrange');

        Route::get('/lojasubmenus', [LojaSubmenuController::class, 'index'])->name('lojasubmenus.index');
        Route::get('/lojasubmenus/crio', [LojaSubmenuController::class, 'create'])->name('lojasubmenus.create');
        Route::post('/lojasubmenus/store', [LojaSubmenuController::class, 'store'])->name('lojasubmenus.store');
        Route::get('/lojasubmenus/{submenu}/editar', [LojaSubmenuController::class, 'edit'])->name('lojasubmenus.edit');
        Route::put('/lojasubmenus/{submenu}/update', [LojaSubmenuController::class, 'update'])->name('lojasubmenus.update');
        Route::delete('/lojasubmenus/{submenu}/destroy', [LojaSubmenuController::class, 'destroy'])->name('lojasubmenus.destroy');
        Route::get('/lojasubmenus/rearrange', [LojaSubmenuController::class, 'rearrange'])->name('lojasubmenus.rearrange');
        //---------------------------------------
        Route::get('/blogs', [BlogController::class, 'Listar'])->name('blogs');
        Route::get('/blogs/excluir/{id}', [BlogController::class, 'ExcluirBlog'])->name('blog.excluir');
        Route::get('/blog/novo', [BlogController::class, 'NovoBlog'])->name('blog.add');
        Route::get('/blog/{id}', [BlogController::class, 'EditarBlog'])->name('blog.editar');
        Route::Post('/blog/post', [BlogController::class, 'Post'])->name('blog.post');

        Route::get('/cases', [CasesController::class, 'Listar'])->name('cases');
        Route::get('/cases/excluir/{id}', [CasesController::class, 'ExcluirCase'])->name('case.excluir');
        Route::get('/case/novo', [CasesController::class, 'NovoCase'])->name('case.add');
        Route::get('/case/{id}', [CasesController::class, 'EditarCase'])->name('case.editar');
        Route::Post('/case/post', [CasesController::class, 'Post'])->name('case.post');

        Route::get('/clientes', [ClienteController::class, 'Listar'])->name('cliente');
        Route::get('/clientes/excluir/{id}', [ClienteController::class, 'ExcluirCliente'])->name('cliente.excluir');
        Route::get('/clientes/novo', [ClienteController::class, 'NovoCliente'])->name('cliente.add');
        Route::get('/clientes/{id}', [ClienteController::class, 'EditarCliente'])->name('cliente.editar');
        Route::Post('/clientes/post', [ClienteController::class, 'Post'])->name('cliente.post');

        Route::get('/subcategorias', [SubcategoriasController::class, 'Listar'])->name('subcategorias');
        Route::get('/subcategorias/excluir/{id}', [SubcategoriasController::class, 'ExcluirSubcategoria'])->name('subcategoria.excluir');
        Route::get('/subcategoria/novo', [SubcategoriasController::class, 'NovaSubcategoria'])->name('subcategoria.add');
        Route::get('/subcategoria/{id}', [SubcategoriasController::class, 'EditarSubcategoria'])->name('subcategoria.editar');
        Route::Post('/subcategoria/post', [SubcategoriasController::class, 'Post'])->name('subcategoria.post');

        Route::get('/cores', [CoresController::class, 'Listar'])->name('cores');
        Route::get('/cores/excluir/{id}', [CoresController::class, 'ExcluirCor'])->name('cor.excluir');
        Route::get('/cor/novo', [CoresController::class, 'NovaCor'])->name('cor.add');
        Route::get('/cor/{id}', [CoresController::class, 'EditarCor'])->name('cor.editar');
        Route::Post('/cor/post', [CoresController::class, 'Post'])->name('cor.post');

        Route::get('/revestimentos', [RevestimentoController::class, 'Listar'])->name('revestimentos');
        Route::get('/revestimentos/excluir/{id}', [RevestimentoController::class, 'ExcluirRevestimento'])->name('revestimento.excluir');
        Route::get('/revestimento/novo', [RevestimentoController::class, 'NovaRevestimento'])->name('revestimento.add');
        Route::get('/revestimento/{id}', [RevestimentoController::class, 'EditarRevestimento'])->name('revestimento.editar');
        Route::Post('/revestimento/post', [RevestimentoController::class, 'Post'])->name('revestimento.post');

        Route::get('/banners', [BannersController::class, 'Listar'])->name('banners');
        Route::get('/banners/excluir/{id}', [BannersController::class, 'ExcluirBanner'])->name('banner.excluir');
        Route::get('/banner/novo', [BannersController::class, 'NovaBanner'])->name('banner.add');
        Route::get('/banner/{id}', [BannersController::class, 'EditarBanner'])->name('banner.editar');
        Route::Post('/banner/post', [BannersController::class, 'Post'])->name('banner.post');

        Route::get('/logout', [AdminSessionController::class, 'Logout'])->name('logout');
        
        Route::get('/menus', [MenuController::class, 'index'])->name('menus.index');
        Route::post('/menus/store', [MenuController::class, 'store'])->name('menus.store');
        Route::get('/menus/crio', [MenuController::class, 'create'])->name('menus.create');
        Route::get('/menus/{menu}/editar', [MenuController::class, 'edit'])->name('menus.edit');
        Route::put('/menus/{menu}/update', [MenuController::class, 'update'])->name('menus.update');
        Route::delete('/menus/{menu}/destroy', [MenuController::class, 'destroy'])->name('menus.destroy');
        Route::get('/menus/rearrange', [MenuController::class, 'rearrange'])->name('menus.rearrange');

        Route::get('/submenus', [SubmenuController::class, 'index'])->name('submenus.index');
        Route::get('/submenus/crio', [SubmenuController::class, 'create'])->name('submenus.create');
        Route::post('/submenus/store', [SubmenuController::class, 'store'])->name('submenus.store');
        Route::get('/submenus/{submenu}/editar', [SubmenuController::class, 'edit'])->name('submenus.edit');
        Route::put('/submenus/{submenu}/update', [SubmenuController::class, 'update'])->name('submenus.update');
        Route::delete('/submenus/{submenu}/destroy', [SubmenuController::class, 'destroy'])->name('submenus.destroy');
        Route::get('/submenus/rearrange', [SubmenuController::class, 'rearrange'])->name('submenus.rearrange');
    });
});