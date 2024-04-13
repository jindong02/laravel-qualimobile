@section('title', 'Todos os Banners')
@extends('admin.layouts.app')
@section('content')
<div class="container">


    <div class="row">
        <div class="col-sm-12">
            <div class="basic-card-table shadow">
                <div class="card-header">
                    <div class="card-head">
                        <div class="head-title">
                            <h3 class="head-text">
                                Todos os Banners
                            </h3>
                        </div>
                    </div>

                </div>
                <div class="card_content">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Imagem</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($banners as $banner)
                            <tr>
                                <th scope="row">
                                    {{ $banner->id }}
                                </th>
                                <td>
                                    {{ $banner->titulo }}
                                </td>
                                <td>
                                    @if(!empty($banner->imagem))
                                    <a class="btn btn-link" href="{{ url('/storage/banners/'.$banner->imagem) }}" target="_blank">Visualizar imagem</a>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.banner.editar', $banner->id) }}">EDITAR</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('admin.banner.excluir', $banner->id) }}" >EXCLUIR</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $banners->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection