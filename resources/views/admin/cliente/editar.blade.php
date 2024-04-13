@section('title', 'Editar opinião')
@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.cliente.post') }}" method="POST" enctype="multipart/form-data" class="basic-card shadow">
                @csrf
                <input type="hidden" name="id" value="{{ $cliente->id }}">

                <div class="card-header">
                    <div class="card-head">
                        <div class="head-title">
                            <h3 class="head-text">
                                {{ $cliente->nome }}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="card_content">
                    @include('admin.layouts.message')

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Nome do cliente</label>
                                <input type="text" class="form-control" name="nome" value="{{ $cliente->nome }}" required="">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Profissão</label>
                                <input type="text" class="form-control" name="empresa" value="{{ $cliente->empresa }}" required="">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Descrição *</label>
                                <textarea class="form-control" name="descricao" rows="3">{{ $cliente->descricao }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Foto de perfil</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="imagem">
                                    <label class="custom-file-label">Selecione uma imagem</label>
                                </div>
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
