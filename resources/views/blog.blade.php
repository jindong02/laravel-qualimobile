@section('title', __('Página Inicial'))
@extends('layouts.app')

@section('content')

<section id="breadcrumb" class="pt-4 pb-0 bg-white mt-6 mt-lg-7 fixed-top">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}">{{ __('Home') }}</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('blog') }}">{{ __('BLOG') }}</a></li>
            </ol>
        </nav>
    </div>
</section>
<section class="pb-0 bg-white mt-6 mt-lg-4 ">
    <div class="container">

        @foreach ($blogs as $blog)

        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">

            <div class="col bg-light p-4">
                <a href="{{ route('blog.detalhes', $blog->slug) }}" class="text-primary text-uppercase">
                    {{ mb_strimwidth($blog->titulo, 0, 80, "...") }}
                </a>
                <h6>
                    {{ mb_strimwidth(strip_tags(html_entity_decode($blog->descricao)), 0, 200, "...") }}
                </h6>
                <hr>
                <div class="row mt-3">
                    <div class="col-12 d-flex">
                        <img class="me-2" style="max-width: 35px;width: 50px;"
                            src="{{ url('/storage/usuario/' . $blog->Admin->perfil) }}" width="20"
                            alt="">
                        <div>
                            <h6 class="text-muted mt-1 mb-0" style=" font-size: 10px; ">POR:</h6>
                            <h6 class="text-muted mb-0">{{ $blog->Admin->nome }}</h6>
                        </div>

                    </div>

                </div>

            </div>
            <div class="col-4 d-none d-lg-block"
                style=" background-image: url({{ url('/storage/blog/' . $blog->imagem) }}); background-size: cover; background-position: left; min-height: 207px; ">
            </div>
        </div>

        @endforeach

        {{ $blogs->links() }}

    </div>

</section>


@endsection
