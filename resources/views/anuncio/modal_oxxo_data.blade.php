<!-- Modal -->
<div class="modal fade" id="modal_oxxo_data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Pagar vía OXXO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                BANCO: <strong>Santander</strong>
                <br>
                CUENTA: <strong>6551004136-2</strong>
                <br>
                CONCEPTO:
                @if (isset($anuncio))
                    <strong>catinmo_<span id="span_concepto_santander_id">{{ $anuncio->id }}</span></strong>
                @else
                    (Se le enviará por correo)
                @endif
                <br>
                MONTO: <strong>$399 MXN</strong>
                <hr>
                BANCO: <strong>HSBC</strong>
                <br>
                CUENTA: <strong>406 669 4308</strong>
                <br>
                CONCEPTO:
                @if (isset($anuncio))
                    <strong>catinmo_<span id="span_concepto_hsbc_id">{{ $anuncio->id }}</span></strong>
                @else
                    (Se le enviará por correo)
                @endif
                <br>
                MONTO: <strong>$399 MXN</strong>
                <hr>
                Es importante que al realizar el pago nos hagas el favor de enviar tu comprobante de pago
                con el asunto
                @if (isset($anuncio))
                    <strong>catinmo_<span id="span_oxxo_id">{{ $anuncio->id }}</span></strong>
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
