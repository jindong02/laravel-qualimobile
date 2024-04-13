@section('title', 'Submenus')

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
                                <a href="{{ route('admin.submenus.create') }}" class="hb-button btn-success btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>Novo submenu</a>
                            </div>
                            <div class="hb-flex-list">
                                <a class="hb-button btn-info btn-sm" id="detailedFilterBtn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="mr-1" id="filterIcon"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="mr-1" id="closeIcon" style="display: none"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    Filtro detalhado
                                </a>
                            </div>
                        </div>
                        <div id="detailedFilterForm" style="display: none" class="mt-3">
                            @include('admin.submenus.partials.filter')
                        </div>
                    </div>
                    <table class="table table-bordered sorted_table mt-3" style="position: relative">
                        <thead class="bg-gray">
                            <tr>
                                @if (request()->get('menu_principal')) <th scope="col">Ordem</th> @endif
                                <th scope="col">Nome</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Menu principal</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody class="sortable">
                        @if ($submenus->count())
                            @foreach ($submenus as $submenu)
                            <tr class="draggable-element" data-id="<?= $submenu->id; ?>">
                                @if (request()->get('menu_principal'))
                                <td>
                                    <span class="drag-area menu-list-dragarea handle"><i class="fa fa-arrows"></i></span>
                                </td>
                                @endif
                                <td>{{ $submenu->name }}</td>
                                <td>{{ $submenu->description }}</td>
                                <td><a href="{{ route('admin.menus.edit', $submenu->mainmenu) }}" class="link-primary">{{ $submenu->mainmenu->name }}</a></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{ route('admin.submenus.edit', $submenu) }}">EDITAR</a>
                                    <a class="btn btn-danger btn-sm" href="{{ route('admin.submenus.destroy', $submenu) }}" data-toggle="modal" data-target="#deleteConfirmModal" data-submenu="{{ $submenu->name }}">EXCLUIR</a>
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

@include('admin/submenus/partials/delete_confirm')

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

    function rearrange(targetRowID, prevRowID, nextRowID) {
        $.get(`/admin/submenus/rearrange?target_row=${targetRowID}&prev_row=${prevRowID}&next_row=${nextRowID}&mainmenu_id=<?= request()->get('menu_principal') ?>`, function(data) {
            console.log('rearranged!');
        });
    }

    $(function () {
        $('#detailedFilterBtn').on('click', function() {
            $('#detailedFilterForm, #filterIcon, #closeIcon').toggle();
        });
    });
</script>
@endpush