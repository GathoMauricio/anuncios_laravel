<!-- Modal -->
<div class="modal fade" id="modal_spei_data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Pagar vía SPEI</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                BANCO: <strong>HSBC</strong>
                <br>
                CLIENTE: <strong>Comercializadora arm21</strong>
                <br>
                CLABE: <strong>014180655100413625</strong>
                <br>
                CONCEPTO:
                @if (isset($anuncio))
                    <strong>catinmo_<span id="span_spein_id">{{ $anuncio->id }}</span></strong>
                @else
                    (Se le enviará por correo)
                @endif
                <br>
                MONTO: <strong>$399 MXN</strong>
                <hr>
                Es importante que al realizar la transferencia nos hagas el favor de enviar tu comprobante de pago
                con el asunto
                @if (isset($anuncio))
                    <strong>catinmo_<span id="span_spein_id">{{ $anuncio->id }}</span></strong>
                @else
                    (Se le enviará por correo)
                @endif

                al siguente correo electrónico <a href="mailto:ventas@arm21.mx">ventas@arm21.mx</a> <br>o al WhatssApp
                <strong>5539799471</strong> para poder validar
                y actualizar el estatus de tu anuncio a la brevedad.
            </div>
            <div class="modal-footer">
                <button type="button" onclick="$('#frm_store_anuncio')[0].submit();" class="btn btn-secondary"
                    data-bs-dismiss="modal">Aceptar</button>
                {{--  <button type="button" class="btn btn-primary">Save changes</button>  --}}
            </div>
        </div>
    </div>
</div>
