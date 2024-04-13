@section('title', 'Todas as publicações')
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
                                Todas as publicações
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
                            @foreach ($blogs as $blog)
                                <tr>
                                    <th scope="row">
                                        {{ $blog->id }}
                                    </th>
                                    <td>
                                        {{ $blog->titulo }}
                                    </td>
                                    <td>
                                        @if (!empty($blog->imagem))
                                            <a class="btn btn-link" href="{{ url('/storage/blog/' . $blog->imagem) }}"
                                                target="_blank">Visualizar imagem</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ route('admin.blog.editar', $blog->id) }}">EDITAR</a>
                                        <a class="btn btn-danger btn-sm"
                                            href="{{ route('admin.blog.excluir', $blog->id) }}">EXCLUIR</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $blogs->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
