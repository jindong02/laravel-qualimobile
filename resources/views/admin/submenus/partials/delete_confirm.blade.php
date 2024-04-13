<!-- Delete Confirm Modal -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmModal" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <form action="" method="post" class="modal-content">
            @csrf
            @method('delete')
            <div class="modal-header">
                <h6 class="modal-title text-muted" id="deleteConfirmModalLabel">Confirmar exclusão</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p style="color: #1d1e1c">Tem certeza de excluir o submenu-<span style="font-weight: 600" id="submenuName"></span>?</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger font-weight-bold">Confirmar</button>
                <button type="button" class="btn btn-outline-secondary font-weight-bold" data-dismiss="modal">Cancelar</button>
            </div>
        </form>
    </div>
</div>
<!-- ./ Delete Confirm Modal -->

@push('scripts')
<script>
    $(function() {
        $('#deleteConfirmModal').on('show.bs.modal', function(e) {
            $(this).find('form').attr('action', $(e.relatedTarget).attr('href'));
            $(this).find('#submenuName').html($(e.relatedTarget).data('submenu'));
        });
    });
</script>
@endpush
