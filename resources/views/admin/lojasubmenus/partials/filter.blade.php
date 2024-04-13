<div class="pb-3 detailed-filter-form">
    <form action="{{ route('admin.lojasubmenus.index') }}" method="get" id="filterForm" class="row">
        <div class="form-group col-md-3">
            <label class="form-label">Menu principal</label>
            <select class="form-control" name="menu_principal" style="height: 46px">
                <option></option>
                @foreach ($mainMenus as $mainMenu)
                    <option
                        value="{{ $mainMenu->id }}"
                        {{ $mainMenu->id == request()->get('menu_principal') ? 'selected' : '' }}
                    >{{ $mainMenu->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-3">
            <label class="form-label">Nome do submenu</label>
            <input type="text" class="form-control" name="nome_submenu" value="{{ request()->get('nome_submenu') }}">
        </div>
        <div class="form-group col-md-6">
            <label class="form-label">Descrição</label>
            <input type="text" class="form-control" name="descricao" value="{{ request()->get('descricao') }}">
        </div>
        <div class="col-md-12 mt-3 text-right">
            <button type="button" class="hb-button" id="searchFormClear">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-counterclockwise" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 1-4.546 2.914.5.5 0 0 0-.908-.417A6 6 0 1 0 8 2v1z"></path>
                    <path d="M8 4.466V.534a.25.25 0 0 0-.41-.192L5.23 2.308a.25.25 0 0 0 0 .384l2.36 1.966A.25.25 0 0 0 8 4.466z"></path>
                </svg>&nbsp;Claro
            </button>
            <button type="submit" class="hb-button hb-button-purple">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>&nbsp;Filtro
            </button>
        </div>
    </form>
</div>

@push('scripts')
<script>
    $(function () {
        $('#searchFormClear').on('click', function () {
            location.href = '<?= route('admin.lojasubmenus.index') ?>';
        });
    });
</script>
@endpush