@section('title', 'Menus principais')
@extends('admin.layouts.app')

@push('styles')
<link rel="stylesheet" href="{{ url('vendors/jquery-ui/themes/base/jquery.ui.all.css') }}">
@endpush

@section('content')
<div class="container" style="min-height: calc(100vh - 147px);">
    <div class="row">
        <div class="col-sm-12">
            @include('admin.layouts.message')

            <div class="basic-card-table shadow">
                <div class="card-header">
                    <div class="card-head">
                        <div class="head-title">
                            <h3 class="head-text">Menus principais</h3>
                        </div>
                    </div>
                </div>
                <div class="card_content">
                    <div class="table-toolbar">
                        <div class="hb-flex-between">
                            <div class="hb-flex-list">
                                <form action="{{ url()->current() }}" method="get" class="hb-flex">
                                    <input autocomplete="off" class="hb-input w-xs-100 hb-search-input" id="search" name="procurar" value="{{ request()->get('procurar') }}" placeholder="Digite qualquer..." type="text" />
                                </form>
                            </div>
                            <div class="hb-flex-list">
                                <a href="{{ route('admin.lojamenus.create') }}" class="hb-button btn-success btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>Novo menu</a>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered sorted_table mt-3" style="position: relative">
                        <thead class="bg-gray">
                            <tr>
                                <th scope="col">Ordem</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Submenus</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody class="sortable">
                        @if ($menus->count())
                            @foreach ($menus as $menu)
                            <tr class="draggable-element" data-id="<?= $menu->id; ?>">
                                <td>
                                    <span class="drag-area menu-list-dragarea handle"><i class="fa fa-arrows"></i></span>
                                </td>
                                <td>{{ $menu->name }}</td>
                                <td>{{ $menu->description }}</td>
                                <td>
                                    @if ($menu->is_single)
                                        Menu único
                                    @else
                                        <a href="{{ route('admin.lojasubmenus.index') }}?menu_principal={{ $menu->id }}" class="link-primary">{{ $menu->submenus->count() }}</a>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.lojamenus.edit', $menu->id) }}">EDITAR</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('admin.lojamenus.destroy', $menu) }}" data-toggle="modal" data-target="#deleteConfirmModal" data-menu="{{ $menu->name }}">EXCLUIR</a>
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr><td colspan="5" style="text-align: center">Sem resultado</td></tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin/lojamenus/partials/delete_confirm')

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>
<script src="{{ url('assets') }}/js/jquery-sortable.js"></script>
<script>
    // Sortable rows
    $('.sorted_table').sortable({
        containerSelector: 'table',
        handle: '.handle',
        itemPath: '> tbody',
        itemSelector: 'tr',
        placeholder: '<tr class="placeholder"/>',
        horizontal: false,
        onDrop: function ($item, container, _super) {
            rearrange($item.data("id"), $item.prev().data("id"), $item.next().data("id"));
            _super($item, container);
        }
    });

    const search = $('#search');
    search.on('input', function (e) {
        clearTimeout(this.delay);
        this.delay = setTimeout(function () {
            window.location.href = '<?= url()->current(); ?>?procurar=' + e.target.value;
        }.bind(this), 700);
    });

    function rearrange(targetRowID, prevRowID, nextRowID) {
        $.get(`/admin/lojamenus/rearrange?target_row=${targetRowID}&prev_row=${prevRowID}&next_row=${nextRowID}`, function(data) {
            console.log('rearranged!');
        });
    }
</script>
@endpush