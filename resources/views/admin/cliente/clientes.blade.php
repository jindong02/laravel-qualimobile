@section('title', 'Todas as opiniões')
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
                                Todas as opiniões
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
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <th scope="row">
                                        {{ $cliente->id }}
                                    </th>
                                    <td>
                                        {{ $cliente->nome }}
                                    </td>
                                    <td>
                                        @if (!empty($cliente->imagem))
                                            <a class="btn btn-link" href="{{ url('/storage/clientes/' . $cliente->imagem) }}"
                                                target="_blank">Visualizar imagem</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.cliente.editar', $cliente->id) }}">EDITAR</a>
                                        <a class="btn btn-danger btn-sm"
                                            href="{{ route('admin.cliente.excluir', $cliente->id) }}">EXCLUIR</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $clientes->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
