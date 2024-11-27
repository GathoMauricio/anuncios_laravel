<!-- Modal -->
<div class="modal fade" id="modal_cambio_estatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cambiar estatus</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('update_estatus_anuncio') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="anuncio_id" id="txt_anuncio_id">
                <div class="modal-body">
                    <select name="estatus_id" id="cbo_estatus_id" class="form-select">
                        <option value="1">Gratis</option>
                        <option value="2">Premium</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="$('#modal_cambio').modal('hide');" class="btn btn-secondary"
                        data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>
