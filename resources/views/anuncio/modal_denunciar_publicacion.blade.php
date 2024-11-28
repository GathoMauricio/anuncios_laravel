<!-- Modal -->
<div class="modal fade" id="modal_denunciar_publicacion" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Denunciar publicacion</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('store_denuncia') }}" method="POST">
                @csrf
                <input type="hidden" name="anuncio_id" id="txt_denunciar_anuncio_id">
                <div class="modal-body">
                    <textarea name="motivo" placeholder="Ingrese el motivo de la denuncia..." class="form-control" required></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" onclick="$('#modal_denunciar_publicacion').modal('hide');"
                        class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
