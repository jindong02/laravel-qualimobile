@section('title', 'Novo revestimento')
@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.revestimento.post') }}" method="POST"  enctype="multipart/form-data" class="basic-card shadow">
                @csrf
                <input type="hidden" name="id" value="0">

                <div class="card-header">
                    <div class="card-head">
                        <div class="head-title">
                            <h3 class="head-text">
                                Novo revestimento
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="card_content">
                    @include('admin.layouts.message')

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Nome</label>
                                <input type="text" class="form-control" name="nome" value="{{ old('nome') }}" required="">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Categoria</label>
                                <input type="text" class="form-control" name="categoria" value="{{ old('categoria') }}" required="">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Material</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="imagem" required="">
                                    <label class="custom-file-label">Selecione uma imagem</label>
                                </div>
                                <small class="text-sm">Medida: 47px x 47px</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary" type="submit">
                        Cadastrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
