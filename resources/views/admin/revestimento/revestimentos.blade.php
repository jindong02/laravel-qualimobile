@section('title', 'Todas os revestimentos')
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
                                Todas os revestimentos
                            </h3>
                        </div>
                    </div>

                </div>
                <div class="card_content">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Material</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($revestimentos as $revestimento)
                            <tr>
                                <th scope="row">
                                    {{ $revestimento->id }}
                                </th>
                                <td>
                                    {{ $revestimento->nome }}
                                </td>
                                <td><img class="rounded-circle" src="{{ url('/storage/revestimentos/' . $revestimento->imagem) }}" width="47" height="47"></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.revestimento.editar', $revestimento->id) }}">EDITAR</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('admin.revestimento.excluir', $revestimento->id) }}" >EXCLUIR</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $revestimentos->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
