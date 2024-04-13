@section('title', 'Política de Privacidade')
@extends('layouts.app')

@section('content')

<section id="breadcrumb" class="pt-4 pb-0 bg-white mt-6 mt-lg-7 fixed-top">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('HOME') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('POLÍTICA DE PRIVACIDADE') }}</li>
            </ol>
        </nav>
    </div>
</section>

<section class="py-0 py-lg-3 mt-8">
    <div class="container">

        <div class="row px-lg-5 px-1 py-4 text-dark g-0 align-items-center justify-content-center">
            <div class="col-12 col-lg-10 p-0">

                <h3 class="mt-3 mb-4 fw-semi-bold text-dark text-center">
                    Política de Privacidade
                </h3>

                {!! Config::get('config.politica_privacidade') !!}

            </div>

        </div>
    </div>


    </div>

</section>
@endsection
