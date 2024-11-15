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
                CLIENTE: <strong>Comercializadora Arm21 sa de cv</strong>
                <br>
                CLABE: <strong>0211 8004 0666 9430 88</strong>
                <br>
                CONCEPTO: <strong>catinmo_<span id="span_spein_id">{{ $anuncio->id }}</span></strong>
                <br>
                MONTO: <strong>$399 MXN</strong>
                <br>
                <br>
                Es importante que al realizar la transferencia nos hagas el favor de enviar tu comprobante de pago 
                con el asunto <strong>"Pago catinmo_#"</strong> 
                al siguente correo electrónico <a href="mailto:ventas@arm21.com">ventas@arm21.com</a> para poder validar 
                y actualizar el estatus de tu anuncio a la brevedad.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                {{--  <button type="button" class="btn btn-primary">Save changes</button>  --}}
            </div>
        </div>
    </div>
</div>
