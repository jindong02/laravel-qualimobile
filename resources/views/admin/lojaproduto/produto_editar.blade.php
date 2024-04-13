@section('title', 'Editar produto')
@extends('admin.layouts.app')
@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

@endpush
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.lojaproduto.post') }}" method="POST" enctype="multipart/form-data"
                class="basic-card shadow">
                @csrf
                <input type="hidden" name="id" value="{{ $produto->id }}">

                <div class="card-header">
                    <div class="card-head">
                        <div class="head-title">
                            <h3 class="head-text">
                                Editar produto
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="card_content">
                    @include('admin.layouts.message')

                    <div class="row">
                        <div class="col-md-6 col-sm-12">

                            <div class="form-group">
                                <label class="form-label">Categoria</label>

                                <select class="form-control" name="id_categoria">
                                    @foreach (App\Models\lojaCategoria::all() as $categoria)
                                        <option {{ $produto->id_categoria == $categoria->id ? 'selected' : '' }}
                                            value="{{ $categoria->id }}">
                                            {{ $categoria->nome?$categoria->nome:"" }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Subcategoria</label>

                                <select class="form-control" name="id_sub_categoria">
                                    @if($produto->lojaCategoria)
                                        @foreach ($produto->lojaCategoria->Subcategoria->all() as $subcategoria)
                                            <option
                                                {{ $produto->id_sub_categoria == $subcategoria->id ? 'selected' : '' }}
                                                value="{{ $subcategoria->id }}">
                                                {{ $subcategoria->nome?$subcategoria->nome:"" }}
                                            </option>
                                        @endforeach  
                                    @endif        
                                </select>

                            </div>

                            <div class="form-group">
                                <label class="form-label">Nome do produto</label>
                                <input type="text" class="form-control" name="nome" value="{{ $produto->nome }}"
                                    required="">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Descrição</label>
                                <textarea class="form-control" name="descricao"
                                    rows="3">{{ $produto->descricao }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">preço </label>
                                <input type="text" class="form-control" name="preço"
                                    placeholder="preço" value="{{ $produto->preço }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Youtube (Opcional)</label>
                                <input type="url" class="form-control" name="youtube"
                                    placeholder="https://www.youtube.com/watch?v=NO_v7C-EZZM"
                                    value="{{ !empty($produto->youtube) ? 'https://www.youtube.com/watch?v=' . $produto->youtube : '' }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Certificações</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="certificacoes">
                                    <label class="custom-file-label">Selecione uma imagem</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">

                            <div class="form-group">
                                <label class="form-label">Dados Técnicos</label>
                                <textarea class="form-control" name="tecnico"
                                    rows="3">{{ $produto->tecnico }}</textarea>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Revestimentos (Opcional)</label>
                                <select name="id_revestimentos[]" class="selectpicker" data-width="100%" data-size="5"
                                    multiple="">
                                    @foreach (App\Models\Revestimentos::all() as $revestimento)
                                        <option value="{{ $revestimento->id }}"
                                            {{ $produto->Revestimentos->find($revestimento->id) ? 'selected' : '' }}>
                                            {{ $revestimento->nome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Cores disponíveis (Opcional)</label>
                                <select name="id_cores[]" class="selectpicker" data-width="100%" data-size="5"
                                    multiple="">
                                    @foreach (App\Models\Cores::all() as $cor)
                                        <option value="{{ $cor->id }}"
                                            {{ $produto->Cores->find($cor->id) ? 'selected' : '' }}>
                                            {{ $cor->nome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <hr class="mt-3 mb-3">
                            <label>Design</label>

                            <div class="form-group">
                                <label class="form-label">Imagens</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="imagem[]" multiple="">
                                    <label class="custom-file-label">Selecione várias imagem</label>
                                    <small class="text-sm">Medida: * x 300px</small>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Modelo Sketchup (Opcional)</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="sketchup" accept=".skp">
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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-pt_PT.min.js"></script>
<script src="https://cdn.tiny.cloud/1/rin4rlj2ti3mqvhbll5yxrymrggzirmcdi57qsczy6x244yh/tinymce/5/tinymce.min.js"
referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        height: 430,
        menubar: false
    });

    $("select[name=id_categoria]").change(function() {
        $.getJSON("/admin/lojaproduto/subcategoria/" + this.value, function(data) {

            $('select[name=id_sub_categoria]').html('');

            $.each(data, function(key, value) {
                $('select[name=id_sub_categoria]').append('<option value=' + value.id + '>' +
                    value.nome + '</option>');
            });
        });
    });
</script>
@endpush
