@section('title', 'Editar Banner')
@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.banner.post') }}" method="POST" enctype="multipart/form-data" class="basic-card shadow">
                @csrf
                <input type="hidden" name="id" value="{{ $banner->id }}">

                <div class="card-header">
                    <div class="card-head">
                        <div class="head-title">
                            <h3 class="head-text">
                                {{ $banner->titulo }}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="card_content">
                    @include('admin.layouts.message')

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Título do banner</label>
                                <input type="text" class="form-control" name="titulo" value="{{ $banner->titulo }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Categoria</label>
                                <select name="id_categoria" class="form-control">
                                    <option value="">Sem categoria</option>
                                    @foreach (App\Models\Categoria::all() as $categoria)
                                    <option value="{{ $categoria->id }}" {{ ($banner->id_categoria == $categoria->id) ? 'selected' : '' }}>{{ $categoria->nome }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Descrição</label>
                                <textarea class="form-control" name="descricao" rows="3">{{ $banner->descricao }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Imagem do banner</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="imagem">
                                    <label class="custom-file-label">Selecione uma imagem</label>
                                    <small class="text-sm">Medida: 1920x1080 pixels (Full HD)</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Link (Saiba Mais)</label>
                                <input type="url" class="form-control" name="link" value="{{ $banner->link }}">
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