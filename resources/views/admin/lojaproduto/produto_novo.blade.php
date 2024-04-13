@section('title', 'Novo produto')
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
                <input type="hidden" name="id" value="0">

                <div class="card-header">
                    <div class="card-head">
                        <div class="head-title">
                            <h3 class="head-text">
                                Novo produto
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
                                <select name="id_categoria" class="form-control" required="">
                                    <option value="">Selecione</option>
                                    @foreach (App\Models\LojaCategoria::all() as $categoria)
                                        <option value="{{ $categoria->id }}"
                                            {{ $categoria->id == old('id_categoria') ? 'selected=""' : '' }}>
                                            {{ $categoria->nome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Subcategoria</label>

                                <select class="form-control" name="id_sub_categoria">
                                    <option value="">Selecione uma categoria</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Nome do produto</label>
                                <input type="text" class="form-control" name="nome" value="{{ old('nome') }}"
                                    required="">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Descrição</label>
                                <textarea name="descricao" rows="3">{{ old('descricao') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Dados Técnicos</label>
                                <textarea name="tecnico" rows="3">{{ old('tecnico') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label class="form-label">preço </label>
                                <input type="text" class="form-control" name="preço"
                                    placeholder="preço" value="{{ old('preço') }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Revestimentos (Opcional)</label>
                                <select name="id_revestimentos[]" class="selectpicker" data-width="100%" data-size="5"
                                    multiple="">
                                    @foreach (App\Models\Revestimentos::all() as $revestimento)
                                        <option value="{{ $revestimento->id }}">{{ $revestimento->nome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Cores disponíveis (Opcional)</label>
                                <select name="id_cores[]" class="selectpicker" data-width="100%" data-size="5"
                                    multiple="">
                                    @foreach (App\Models\Cores::all() as $cor)
                                        <option value="{{ $cor->id }}">{{ $cor->nome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Youtube (Opcional)</label>
                                <input type="url" class="form-control" name="youtube"
                                    placeholder="https://www.youtube.com/watch?v=NO_v7C-EZZM"
                                    value="{{ old('youtube') }}">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Certificações</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="certificacoes">
                                    <label class="custom-file-label">Selecione uma imagem</label>
                                </div>
                            </div>

                            <hr class="mt-3 mb-3">
                            <label>Design</label>

                            <div class="form-group">
                                <label class="form-label">Imagens</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="imagem[]" multiple=""
                                        required="">
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
                        Cadastrar
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
