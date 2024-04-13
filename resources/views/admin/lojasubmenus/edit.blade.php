@section('title', 'Editar submenu')

@extends('admin.layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ url('vendors/chosen-js/chosen.min.css') }}">
<link rel="stylesheet" href="{{ url('vendors/select2/css/select2.min.css') }}">
@endpush

@section('content')
<div class="container" style="min-height: calc(100vh - 147px);">
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('admin.lojasubmenus.update', $submenu) }}" method="POST" class="basic-card shadow" data-parsley-validate>
                @csrf
                @method('put')
                <div class="card-header">
                    <div class="card-head">
                        <div class="head-title"><h3 class="head-text">Editar submenu</h3></div>
                    </div>
                </div>
                <div class="card_content">
                    @include('admin.layouts.message')
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label">Menu principal<span class="text-danger">*</span></label>
                            <select
                                name="menu_id"
                                class="single-chosen-select form-control"
                                data-placeholder="Selecione um menu principal"
                                data-parsley-required-message="Selecione um menu principal"
                                data-parsley-errors-container="#error-container"
                                required
                            >
                                <option></option>
                                @foreach ($mainMenus as $mainMenu)
                                    <option
                                        value="{{ $mainMenu->id }}"
                                        {{ $mainMenu->id == old('menu_id', $submenu->menu_id) ? 'selected' : '' }}
                                    >{{ $mainMenu->name }}</option>
                                @endforeach
                            </select>
                            <span id="error-container"></span>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label">Nome do submenu<span class="text-danger">*</span></label>
                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                value="{{ old('name', $submenu->name) }}"
                                required
                                data-parsley-required-message="Digite o nome do submenu"
                            >
                        </div>
                        <div class="col-md-6 col-sm-12 mt-3">
                            <label class="form-label">Descrição</label>
                            <textarea class="form-control" name="description" rows="3">{{ old('description', $submenu->description) }}</textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label">Categoria de Produto<span class="text-danger">*</span></label>
                            <select
                                name="categoria_id"
                                class="single-chosen-select form-control"
                                data-placeholder="Selecione uma categoria de produto"
                                data-parsley-required-message="Selecione uma categoria de produto"
                                data-parsley-errors-container="#error-container1"
                                required
                            >
                                <option></option>
                                @foreach ($produtoCategorias as $categoria)
                                    <option
                                        value="{{ $categoria->id }}"
                                        {{ $categoria->id == old('categoria_id', $submenu->categoria->first() ? $submenu->categoria->first()->id : '') ? 'selected' : '' }}
                                    >{{ $categoria->nome }}</option>
                                @endforeach
                            </select>
                            <span id="error-container1"></span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label">Subcategoria</label>
                            <select class="form-control select2" name="subcategoria_ids[]" multiple="multiple" data-placeholder="Todas as subcategorias">
                                <?php
                                    if (old('categoria_id')) {
                                        $produtoSubcategorias = \App\Models\lojaCategoria::find(old('categoria_id'))->Subcategoria->all();
                                    }
                                ?>
                                @foreach ($produtoSubcategorias as $subcategoria)
                                <option
                                    value="{{ $subcategoria->id }}"
                                    {{ in_array($subcategoria->id, old('subcategoria_ids', $submenu->subcategorias->pluck('id')->all())) ? 'selected' : '' }}
                                >{{ $subcategoria->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="{{ route('admin.lojasubmenus.index') }}" class="btn btn-default">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ url('vendors') }}/parsleyjs/parsley.min.js"></script>
<script src="{{ url('vendors') }}/chosen-js/chosen.jquery.js"></script>
<script src="{{ url('vendors') }}/select2/js/select2.min.js"></script>

<script>
(function ($) {
    $(".single-chosen-select").chosen({
        disable_search_threshold: 5,
        no_results_text: 'Nenhum resultado corresponde',
    }).trigger('change');

    $('.select2').select2();

    $("select[name=categoria_id]").on('change', function(e) {
        $.getJSON("/admin/lojaproduto/subcategoria/" + e.target.value, function(data) {
            $('select[name="subcategoria_ids[]"').html('');

            $.each(data, function(key, value) {
                $('select[name="subcategoria_ids[]"]').append('<option value=' + value.id + '>' +
                    value.nome + '</option>');
            });
        });
    });
})(jQuery);
</script>
@endpush