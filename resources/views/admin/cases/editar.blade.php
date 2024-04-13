@section('title', 'Editar case')
@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.case.post') }}" method="POST" enctype="multipart/form-data"
                class="basic-card shadow">
                @csrf
                <input type="hidden" name="id" value="{{ $case->id }}">

                <div class="card-header">
                    <div class="card-head">
                        <div class="head-title">
                            <h3 class="head-text">
                                {{ $case->titulo }}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="card_content">
                    @include('admin.layouts.message')

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">Título *</label>
                                <input type="text" class="form-control" name="titulo" value="{{ $case->titulo }}"
                                    required="">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Descrição *</label>
                                <textarea class="form-control" name="descricao"
                                    rows="3">{{ $case->descricao }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Imagem de capa *</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="imagem">
                                    <label class="custom-file-label">Selecione uma imagem</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Galeria de fotos</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="galeria[]" multiple="">
                                    <label class="custom-file-label">Selecione várias imagem</label>
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

@push('scripts')
<script src="https://cdn.tiny.cloud/1/rin4rlj2ti3mqvhbll5yxrymrggzirmcdi57qsczy6x244yh/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
<script>
    tinymce.init({
    selector: 'textarea[name="descricao"]',
    height: 430,
    menubar: false
});
</script>
@endpush
