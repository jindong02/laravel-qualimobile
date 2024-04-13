@section('title', 'A QUALIMOBILE')
@extends('loja_layouts.app')
@section('content')

<section id="breadcrumb" class="pt-4 pb-0 bg-white mt-6 mt-lg-7 fixed-top">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">Loja</a></li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-0 py-lg-3 mt-8">
    <div class=" px-2 px-lg-4">
    </div>
</section>

<section class="py-0 py-lg-3">    
    <div class="mx-2">
        <div class="border-top" style="border-top: 1px solid rgb(52, 111, 238) !important;"></div> 
            
                <?php
                    $mainMenus = \App\Models\LojaMenu::orderBy('order')->get();
                ?>
                <div class="col-12 row">        
                @foreach ($mainMenus as $mainMenu)
                    <div class="col-12"><br/> <h2 style="text-align:center;">{{$mainMenu->name}}</h2></div><br/>
                           
                        <?php
                            $submenus = \App\Models\LojaSubmenu::where("menu_id", $mainMenu->id)->get();                    
                        ?>
                        @foreach ($submenus as $subMenu)
                                <?php                        
                                    $produtos = getprodutos($mainMenu->slug, $subMenu->slug);
                                ?>
                                @foreach ($produtos as $produto)
                                <div class="col-lg-3 col-md-6 col-12">
                                    <a href = "{{ route('lojaproduto', ['slug' => $produto->slug]) }}" class="card-rel shadow rounded-2 m-2" style="width: 100%;">
                                        <div class="rounded img-thumbnail"
                                            style=" background-image: url({{ url('/storage/produtos/' . current($produto->imagem)) }}); width: 100%; height: 330px; background-position: center; background-size: cover; ">
                                        </div>
                                        <div >
                                            <div class = "card-title">
                                                <h4 class="text-dark  mt-3 " style = "text-align: center; padding-bottom:15px; ">
                                                    {{ $produto->nome }} </h4>
                                            </div>
                
                                            <div  style = "text-align: center; ">
                                                <div class="row" style="margin-left:2px; margin-right:2px; background-color:rgb(79, 136, 221);">
                                                    
                                                    <div class="col-4">
                                                        <button type="button" class="btn btn-Success" style="margin-top:5px; margin-bottom:5px;">comprar</button>
                                                    </div>
                                                    <div class="col-6">
                                                        <h4 class="card-text" style="line-height: 44px; margin-top: 5px;"> R$ {{ $produto->preço }} </h4>
                                                    </div>
                                                </div>  
                                            </div> <br/>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                        
                        @endforeach 
                
                @endforeach
                </div>
        </div>      
    </div>
</section>

<section class="conheca-historia py-0 min-vh-100 ">
</section>


<section class="fale-conosco-tag py-0">

    <div class="container mt-5">

        <div class="row flex-center justify-content-center align-content-center align-self-center min-vh-50">
            <div class="col-8 text-center ">

                <h5 class="fw-semi-bold lh-sm text-center pt-6 pb-2 text-white">
                    {{ __('FALE CONOSCO') }}
                </h5>

                <p class=" fw-light fs-0 text-white">
                    {{ __('Em breve nossa equipe entrará em contato.') }}

                </p>

                <a class="btn btn-light rounded-0 py-3 px-4 fs-lg--1 fs--2 text-uppercase mt-3" href="{{ route('contato') }}">
                    {{ __('ENTRAR EM CONTATO') }}
                </a>
            </div>
        </div>

    </div>
</section>

@php
    function getprodutos($menuslug,$submenuslug){
        if ($submenuslug) {
            $submenu = \App\Models\LojaSubMenu::where('slug', $submenuslug)->first();
            $categoria = $submenu->categoria->first();
            $subcategorias = $submenu->subcategorias;
        } else if ($menuslug) {
            $menu = \App\Models\LojaMenu::where('slug', $menuslug)->first();
            $categoria = $menu->categoria->first();

            if (! $categoria) {
                $oneSubmenu = $menu->submenus->first();
                if ($oneSubmenu) {
                    $categoria = $oneSubmenu->categoria->first();
                }
            }
            $subcategorias = $menu->subcategorias;
        } else {
            $categoria = null;
            $subcategorias = null;
        }
        
        $produtos = \App\Models\LojaProduto::where(function ($query) use ($categoria, $subcategorias) {
            if ($subcategorias && !$subcategorias->isEmpty()) {
                $query->whereIn('id_sub_categoria', $subcategorias->pluck('id')->all());
            } else if ($categoria) {
                $query->where('id_categoria', $categoria->id);
            }                     
        })->paginate(5);        
        return $produtos;
    }
@endphp