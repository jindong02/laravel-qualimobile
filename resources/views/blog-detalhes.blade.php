@section('title', __('Página Inicial'))
@extends('layouts.app')

@push('styles')
    <link rel="preload stylesheet" href="{{ url('vendors/OwlCarousel2/assets/owl.theme.default.min.css') }}" as="style" />
@endpush


@section('content')

<section id="breadcrumb" class="pt-4 pb-0 bg-white mt-6 mt-lg-7 fixed-top">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('Home') }}</a></li>
                <li class="breadcrumb-item "><a href="{{ route('blog') }}">{{ __('BLOG') }}</a></li>
                <li class="breadcrumb-item active text-truncate">
                    {{ $blog->titulo }}
                </li>
            </ol>
        </nav>
    </div>
</section>

<section class="p-lg-11 py-lg-3 pb-0 bg-white mt-6 mt-lg-8">
    <div class="row g-0 border rounded overflow-hidden flex-md-row shadow-sm h-md-250 position-relative">
        <div class="col bg-light px-4 py-5">
            <h4 class="text-uppercase">
                {{ $blog->titulo }}
            </h4>
            <hr class="w-100" style="color: #e8e8e8;">
            <div class="d-none d-sm-flex row mt-3">
                <div class="col-6 d-flex">
                    <img class="me-2" style="max-width: 35px;width: 50px;"
                        src="{{ url('/storage/usuario/' . $blog->Admin->perfil) }}" width="20" alt="">
                    <div>
                        <h6 class="text-muted mt-1 mb-0" style=" font-size: 10px; ">POR:</h6>
                        <h6 class="text-dark mb-0">{{ $blog->Admin->nome }}</h6>
                    </div>
                </div>
                <div class="col-6 d-flex">
                    <div>
                        <h6 class="text-muted mt-1 mb-0" style=" font-size: 10px; ">EM:</h6>
                        <h6 class="text-dark mb-0 text-uppercase">
                            {{ $blog->data->isoFormat('DD [de] MMMM [de] YYYY') }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row h-100 align-items-end text-white g-0">
    </div>
</section>

<section class="p-3 p-lg-11 py-lg-5">

    {!! $blog->descricao !!}

</section>


@endsection

@push('scripts')
<script src="{{ url('assets/js/jquery-3.6.0.slim.min.js') }}"></script>
<script src="{{ url('vendors/OwlCarousel2/owl.carousel.min.js') }}"></script>
<script>
    $('.owl-blog').owlCarousel({
        loop: true,
        margin: 1,
        responsiveClass: true,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 5,
            }
        }
    })
</script>

@endpush
