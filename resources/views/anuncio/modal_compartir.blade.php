<!-- Modal -->
<div class="modal fade" id="modal_compartir_{{ $share_anuncio_id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Compartir</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="fb-share-button" {{--  data-href="{{ route('ver_anuncio', $share_anuncio_id) }}"  --}} data-href="https://twitter.com/"
                    data-layout="button_count" style="">
                </div>
                <br><br>
                <button class="btn btn-primary" onclick="compartirFb();" style="width: 100%;">Compartir en
                    Facebook</button>
                <br><br>
                <button class="btn btn-success" style="width: 100%;">Compartir en WhatsApp</button>
                <br><br>
                <button class="btn btn-primary" style="width: 100%;">Compartir en Facebook</button>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="$('#modal_compartir_{{ $share_anuncio_id }}').modal('hide');"
                    class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>
