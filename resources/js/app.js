import "./bootstrap";
import Swal from "sweetalert2";

$(document).ready(function () {
    $("#frm_store_anuncio").submit((e) => {
        e.preventDefault();
    });
});
window.validarCrearAnuncio = () => {
    if ($("#cbo_categoria_id_create").val().length <= 0) {
        alertify.warning("Selecciona una categoría.");
        return false;
    }
    if ($("#cbo_subcategoria_id_create").val().length <= 0) {
        alertify.warning("Selecciona una subcategoría.");
        return false;
    }
    if ($("#txt_titulo_create").val().length <= 0) {
        alertify.warning("Ingresa un título.");
        return false;
    }
    if ($("#txt_descripcion_create").val().length <= 0) {
        alertify.warning("Ingresa una descripción.");
        return false;
    }
    if ($("#txt_precio_create").val().length <= 0) {
        alertify.warning("Ingresa una precio.");
        return false;
    }
    if ($("#cbo_estado_create").val().length <= 0) {
        alertify.warning("Selecciona un estado.");
        return false;
    }
    if ($("#cbo_municipio_create").val().length <= 0) {
        alertify.warning("Selecciona un municipio.");
        return false;
    }
    if ($("#cbo_colonia_create").val().length <= 0) {
        alertify.warning("Selecciona una colonia.");
        return false;
    }
    if ($("#txt_calle_numero_create").val().length <= 0) {
        alertify.warning("Ingresa calle y número.");
        return false;
    }
    if ($(".archivo_imagen").length <= 0) {
        alertify.warning("Selecciona por lo menos una imagen.");
        return false;
    }
    var validacion_imagenes = true;
    $.each($(".archivo_imagen"), function (index, item) {
        if ($("#" + item.id).val().length <= 0) {
            alertify.warning("Selecciona todas las imagenes.");
            validacion_imagenes = false;
        }
    });
    if (validacion_imagenes) {
        if ($("#flexSwitchCheckDefaultPremium").prop("checked")) {
            $("#modal_confirmacion_create").modal("show");
        } else {
            $("#frm_store_anuncio")[0].submit();
        }
    }
};

var contadorImagenes = 0;
window.agregarImagen = () => {
    if (contadorImagenes == 0) {
        $("#container_imagenes").html("");
    }
    contadorImagenes++;
    $("#container_imagenes").append(
        `
                <div class="col-md-12" id="item_imagen_${contadorImagenes}">
                    <table style="width: 100%;">
                        <tr>
                            <td width="45%">
                                <input type="file" name="archivo_imagen[]" id="imagen_${contadorImagenes}" class="form-control archivo_imagen"
                                    accept="image/png, image/jpg, image/jpeg" required/>
                            </td>
                            <td width="45%">
                                <input type="text" name="descripcion_imagen[]" class="form-control"
                                    placeholder="Descripción..."/>
                            </td>
                            <td width="10%">
                                <button type="button" onclick="quitarImagen(${contadorImagenes});"
                                    class="btn btn-warning">Quitar</button>
                            </td>
                        </tr>
                    </table>
                </div>
                `
    );
};

window.quitarImagen = (id) => {
    $("#item_imagen_" + id).remove();
    contadorImagenes--;
    if (contadorImagenes == 0) {
        $("#container_imagenes").html(
            `
                    <center>
                        No se ha seleccionado ninguna imagen
                        <br><br>
                        <a href="javascript:void(0);" onclick="agregarImagen();" class="btn btn-primary">
                            + Agregar imagen
                        </a>
                    </center>
                `
        );
    }
};
