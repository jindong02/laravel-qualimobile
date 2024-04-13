@section('title', 'Editar Categoria')
@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.categoria.post') }}" method="POST" enctype="multipart/form-data" class="basic-card shadow">
                @csrf
                <input type="hidden" name="id" value="{{ $categoria->id }}">

                <div class="card-header">
                    <div class="card-head">
                        <div class="head-title">
                            <h3 class="head-text">
                                {{ $categoria->nome }}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="card_content">
                    @include('admin.layouts.message')

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Nome da categoria</label>
                                <input type="text" class="form-control" name="nome" value="{{ $categoria->nome }}" required="">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Imagem da categoria</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="imagem">
                                    <label class="custom-file-label">Selecione uma imagem</label>
                                </div>
                                <small class="text-sm">Medida: 475px x 341px</small>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary" type="submit">
                        Atualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection