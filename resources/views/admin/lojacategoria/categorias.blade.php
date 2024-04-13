@section('title', 'Todas as lojacategorias')
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
                                Loja Todas as categorias
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
                                <th scope="col">Imagem</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categorias as $categoria)
                            <tr>
                                <th scope="row">
                                    {{ $categoria->id }}
                                </th>
                                <td>
                                    {{ $categoria->nome }}
                                </td>
                                <td><a class="btn btn-link" href="{{ url('/storage/categorias/'.$categoria->imagem) }}" target="_blank">Visualizar imagem</a></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('produtos', ['c' => $categoria->id]) }}" target="_blank">VISUALIZAR</a>
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.lojacategoria.editar', $categoria->id) }}">EDITAR</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('admin.lojacategoria.excluir', $categoria->id) }}" >EXCLUIR</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categorias->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
