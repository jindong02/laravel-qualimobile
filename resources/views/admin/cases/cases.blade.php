@section('title', 'Todos os cases')
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
                                Todos os cases
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
                            @foreach ($cases as $case)
                                <tr>
                                    <th scope="row">
                                        {{ $case->id }}
                                    </th>
                                    <td>
                                        {{ $case->titulo }}
                                    </td>
                                    <td>
                                        @if (!empty($case->imagem))
                                            <a class="btn btn-link" href="{{ url('/storage/cases/' . $case->imagem) }}"
                                                target="_blank">Visualizar imagem</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.case.editar', $case->id) }}">EDITAR</a>
                                        <a class="btn btn-danger btn-sm"
                                            href="{{ route('admin.case.excluir', $case->id) }}">EXCLUIR</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $cases->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
