@section('title', 'Todas as lojaSubcategoria')
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
                                Loja Todas as Subcategorias
                            </h3>
                        </div>
                    </div>

                </div>
                <div class="card_content">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Categoria principal</th>
                                <th scope="col">Subcategoria</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subcategorias as $subcategoria)
                                <tr>
                                    <th scope="row">
                                        {{ $subcategoria->id }}
                                    </th>
                                    <td>
                                        {{ $subcategoria->Categoria?->nome }}
                                    </td>
                                    <td>
                                        {{ $subcategoria?->nome }}
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.lojasubcategoria.editar', $subcategoria->id) }}">
                                            EDITAR
                                        </a>
                                        <a class="btn btn-danger btn-sm"
                                            href="{{ route('admin.lojasubcategoria.excluir', $subcategoria->id) }}">
                                            EXCLUIR
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $subcategorias->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
