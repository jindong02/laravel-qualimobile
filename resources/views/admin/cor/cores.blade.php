@section('title', 'Todas as cores')
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
                                Todas as cores
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
                            @foreach($cores as $cor)
                            <tr>
                                <th scope="row">
                                    {{ $cor->id }}
                                </th>
                                <td>
                                    {{ $cor->nome }}
                                </td>
                                <td><img class="rounded-circle" src="{{ url('/storage/cores/' . $cor->imagem) }}" width="47" height="47"></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.cor.editar', $cor->id) }}">EDITAR</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('admin.cor.excluir', $cor->id) }}" >EXCLUIR</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $cores->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
