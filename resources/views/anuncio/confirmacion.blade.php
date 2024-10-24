<!-- Modal -->
<div class="modal fade" id="modal_confirmacion_create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">¡Vamos al pago!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Usted está a punto de ser redirigido a nuestra pasarela de pago ofrecida por <a
                    href="https://stripe.com/mx" target="_BLANK"><img src="{{ asset('img/stripe.png') }}"
                        width="40"></a> el servicio de pagos en linea más seguro del la red con el respaldo de
                clientes importantes como:
                <img src="{{ asset('img/stripe_clientes.png') }}" width="100%">
                Le recordamos que nosotros no almacenamos de ninguna forma su información bancaria.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-warning text-light" onclick="confirmarCompra();"><span
                        class="icon icon-star-full"></span>Hacer Premium</button>
            </div>
        </div>
    </div>
</div>
