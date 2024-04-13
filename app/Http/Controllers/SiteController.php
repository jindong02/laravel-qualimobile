<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Newsletter;
use App\Mail\ContatoMail;
use App\Mail\OrcamentoMail;

use Mail;
use Config;

class SiteController extends Controller
{

    public function Index()
    {
        $Banners = Cache::remember(session()->getId(), 30, function () {
            return Banner::with('Categoria')->orderByRaw('RAND()')->limit(3)->get();
        });

        return view('index', [
            'banners' => $Banners,
             'blogs' => Blog::has('Admin')->orderBy('id', 'DESC')->limit(5)->get(),
             'clientes' => Cliente::orderByRaw('RAND()')->limit(4)->get()
            ]);
    }

    public function Historia()
    {
        return view('historia');
    }

    public function Loja()
    {
        return view('loja');
    }

    public function Contato()
    {
        return view('contato');
    }

    public function Cases()
    {
        return view('cases');
    }

    public function CasesView()
    {
        return view('casesview');
    }

    public function Blog()
    {
        Paginator::defaultView('layouts/paginacao');

        $blogs = Blog::has('Admin')->orderBy('id', 'DESC')->paginate(10);

        return view('blog', ['blogs' => $blogs]);
    }

    public function BlogDetalhes(Request $request)
    {
        $blog = Blog::where('slug', $request->slug)->has('Admin')->first();

        if ($blog) {
            return view('blog-detalhes', ['blog' => $blog]);
        }

        return redirect(route('blog'));
    }

    public function ContatoPost(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email',
            'telefone' => 'required|string',
            // 'tipo' => 'required|string',
            // 'eusou' => 'required|string',
            // 'como' => 'required|string',
            // 'estado' => 'required|string',
            // 'cidade' => 'required|string',
            'mensagem' => 'required',
        ]);

        Mail::to(config('config.email'))->send(new ContatoMail($request->all()));

        $newsletter = Newsletter::firstOrNew(array('email' => $request->email));
        $newsletter->nome = $request->nome;
        $newsletter->save();

        // return redirect()->back()->with('success', __('Email enviado com sucesso!'));
        return redirect()->route('ConfirmacaoContato');
    }

    public function ConfirmacaoContato()
    {
        return view('confirmacao-contato');
    }

    public function OrcamentoPost(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email',
            'telefone' => 'required|string',
            // 'tipo' => 'required|string',
            // 'eusou' => 'required|string',
            // 'como' => 'required|string',
            // 'estado' => 'required|string',
            // 'cidade' => 'required|string',
            'mensagem' => 'required',
        ]);

        Mail::to(config('config.email'))->send(new OrcamentoMail($request->all()));

        $newsletter = Newsletter::firstOrNew(array('email' => $request->email));
        $newsletter->nome = $request->nome;
        $newsletter->save();

        return redirect()->back()->with('success', __('Email enviado com sucesso!'));
    }

    public function Newsletter(Request $request)
    {

        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email',
        ]);

        $newsletter = Newsletter::firstOrNew(array('email' => $request->email));
        $newsletter->nome = $request->nome;
        $newsletter->save();

        return redirect()->to('/#newsletter')->with('success', __('Cadastro realizado com sucesso'));
    }
}
