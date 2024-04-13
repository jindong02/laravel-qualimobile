@section('title', 'A QUALIMOBILE')
@extends('layouts.app')
@section('content')

<section id="breadcrumb" class="pt-4 pb-0 bg-white mt-6 mt-lg-7 fixed-top">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('HOME') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('A QUALIMOBILE') }}</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-0 py-lg-3 mt-8">
    <div class="container">

        <div class="row px-lg-5 px-1 py-4 text-dark g-0 align-items-center justify-content-center">

            <div class="col-12 col-lg-6 p-0">


                <p class="mt-3 mb-4  fs-0 fs-lh-1 fw-semi-bold text-dark text-center">
                    {{ __('A Quali Mobile, sempre em busca de crescimento, valoriza cada cliente, sendo ele pequeno, médio ou grande porte. Com móveis e cadeiras corporativas de qualidade e garantia.') }}
                </p>

                <p class="mt-3 mb-4  fs--1 fw-medium text-dark text-center">
                    {{ __('Trabalhamos com móveis diversificados, com várias linhas, acabamentos, sendo mobiliários corporativos de linha ou planejado. Tendo em vista atender a todos, mediante Buget, layout e idealização para sua nova aquisição.') }}
                </p>
            </div>


        </div>


    </div>

</section>

<section class="py-0">
    <div class=" px-2 px-lg-4">


        <div class="img-historia" >

        </div>
    </div>


    <div class="pt-11 pb-5 bg-primary bg-historia bg-historia">
        <div class="container">
            <div class="px-lg-7 px-2 ">
                <div class="row align-items-center justify-content-start  align-content-center min-vh-75 px-lg-6 px-0 px-sm-0">
                    <div class="col-lg-5 col-12 text-start  order-lg-0  order-1">
                        <p class="mt-3 mb-4  fs-0 fs-lh-1 fw-medium text-white text-star lh-1">
                            {{ __('Possuímos um show Room em Guarulhos, e realizamos visitas técnicas, com vendedores especializados e capacitados para um melhor atendimento. Vamos crescer juntos?') }}
                        </p>

                    </div>
                    <div class="col-12 col-lg-7 text-end img-sobre-campo order-0  order-lg-1 p-1">
                        <img loading="lazy" src="assets/img/cadeira-01.png"> 
                    </div>
                </div>
                <div class="row align-items-center justify-content-start  align-content-center min-vh-75 px-lg-6 px-0 px-sm-0  mt-lg-8 mt-5">

                    <div class="col-12 col-lg-7 text-star img-sobre-campo p-1 ">
                        <img loading="lazy" src="assets/img/mesas-01.png"> 


                    </div>
                    <div class="col-lg-5 col-12 text-star">
                        <p class="mt-3 mb-4  fs-0 fs-lh-1 fw-medium text-white text-star lh-1">
                            {{ __('Missão: Satisfazer as necessidades de cada cliente, de uma forma personalizada. Superando as expectativas de cada projeto.') }}
                        </p>
                        <p class="mt-3 mb-4  fs-0 fs-lh-1 fw-medium text-white text-star lh-1">
                            {{ __('Visão: Ser entre muitas, a melhor e reconhecida pela sua qualidade em mobiliários corporativos.') }}
                        </p>

                    </div>

                </div>

            </div>

        </div>
    </div>

</section>
<section class="conheca-historia py-0 min-vh-100 ">
</section>


<section class="py-0 py-lg-3 mt-5">
    <div class="container">

        <div class="row px-lg-5 px-1 py-4 text-dark g-0 align-items-center justify-content-center">

            <div class="col-12 col-lg-10 p-0">


                <p class="mt-3 mb-4 fs-0 fs-lh-1fw-medium text-dark text-star">
                    {{ __('Pensando no futuro, A QualiMobile investe em ações de responsabilidade social e preservação do meio ambiente. Toda a madeira utilizada em nossos processos de fabricação é proveniente de reflorestamento e possuímos um rígido controle de geração, destinação e reciclagem de resíduos industriais, tratando efluentes e buscando constantes melhorias nos processos a fim de minimizar impactos ambientais.') }}
                </p>

                <p class="mt-3 mb-4 fs-0 fw-semi-bold text-dark text-star">
                    {{ __('A sua casa é a sua cara. A decoração da sua casa tem que ter a sua cara. É lá que você chega. É pra lá que você foge. Nela só entram pessoas da sua vida. Só as pessoas da sua vida. Por isso, na sua casa tem que ter Salvatore. Que é a cara da sua casa. Que vai acolher os seus amigos. E vai fazer sua casa virar grife. Referência de estilo.') }}
                </p>
            </div>


        </div>


    </div>

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
@endsection