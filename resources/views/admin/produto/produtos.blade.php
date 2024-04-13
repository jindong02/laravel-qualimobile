@section('title', 'Todos os produtos')

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
                                Todos os produtos
                            </h3>
                        </div>
                    </div>

                </div>
                <div class="card_content">
                    @include('admin.layouts.message')

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Subcategoria</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produtos as $produto)
                            <tr>
                                <th scope="row">
                                    {{ $produto->id }}
                                </th>
                                <td>
                                    <img class="rounded-circle mr-3" src="{{ url('/storage/produtos/' . current($produto->imagem)) }}" width="50" height="50">
                                    {{ $produto->nome }}
                                </td>
                                <td>{{ optional($produto->Categoria)->nome }}</td>
                                <td>{{ optional($produto->Subcategoria)->nome }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{ route('produto', $produto->slug) }}" target="_blank">VISUALIZAR</a>
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.produto.editar', $produto->id) }}">EDITAR</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('admin.produto.excluir', $produto->id) }}" >EXCLUIR</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $produtos->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
