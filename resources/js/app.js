import "./bootstrap";
import Swal from "sweetalert2";
import axios from "axios";

$(document).ready(function () {
    $("#frm_store_anuncio").submit((e) => {
        e.preventDefault();
        validarCrearAnuncio();
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

    var valida_texto = true;
    //alertify.succes("Analizando texto.");
    // axios
    //     .get("/analizar_texto/" + $("#txt_titulo_create").val())
    //     .then((response) => {
    //         if (
    //             response.data.attributeScores.IDENTITY_ATTACK.summaryScore
    //                 .value > 0.1 ||
    //             response.data.attributeScores.INSULT.summaryScore.value > 0.1 ||
    //             response.data.attributeScores.PROFANITY.summaryScore.value >
    //                 0.1 ||
    //             response.data.attributeScores.SEVERE_TOXICITY.summaryScore
    //                 .value > 0.1
    //         ) {
    //             $("#modal_normas").modal("show");
    //             valida_texto = false;
    //             return false;
    //         }
    //     })
    //     .catch((error) => {
    //         console.log(error);
    //     });
    // axios
    //     .get("/analizar_texto/" + $("#txt_descripcion_create").val())
    //     .then((response) => {
    //         if (
    //             response.data.attributeScores.IDENTITY_ATTACK.summaryScore
    //                 .value > 0.1 ||
    //             response.data.attributeScores.INSULT.summaryScore.value > 0.1 ||
    //             response.data.attributeScores.PROFANITY.summaryScore.value >
    //                 0.1 ||
    //             response.data.attributeScores.SEVERE_TOXICITY.summaryScore
    //                 .value > 0.1
    //         ) {
    //             $("#modal_normas").modal("show");
    //             valida_texto = false;
    //             return false;
    //         }
    //     })
    //     .catch((error) => {
    //         console.log(error);
    //     });

    setTimeout(function () {
        if (validacion_imagenes && valida_texto) {
            switch ($("#cbo_tipo_anuncio").val()) {
                case "gratis":
                    alertify.success("Enviando información.");
                    $("#boton_enviar").prop("disabled", true);
                    $("#frm_store_anuncio")[0].submit();
                    break;
                case "stripe":
                    $("#modal_confirmacion_create").modal("show");
                    break;
                case "spei":
                    $("#modal_spei_data").modal("show");
                    break;
                case "oxxo":
                    $("#modal_oxxo_data").modal("show");
                    break;
            }
        }
    }, 500);
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
                            <td width ="15%" style="padding:5px;">
                                <img src="#" width="100%" style="display:none;" id="img_src_${contadorImagenes}">
                                <small id="span_src_${contadorImagenes}" style="display:none;text-align:center;width:100%"></small>
                            </td>
                            <td width="30%">
                                <input type="file" name="archivo_imagen[]" id="imagen_${contadorImagenes}" onchange="cargarImagen(${contadorImagenes})" class="form-control archivo_imagen"
                                    accept="image/png, image/jpg, image/jpeg" required/>
                            </td>
                            <td width="40%">
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

window.cargarImagen = (id) => {
    const input_file = $("#imagen_" + id)[0]; // Obtenemos el elemento DOM nativo
    let vista_previa = $("#img_src_" + id); // Obtenemos el objeto jQuery de la imagen
    let span_src = $("#span_src_" + id);

    // Definimos el tamaño máximo permitido en bytes (5 MB = 5 * 1024 * 1024 bytes)
    const MAX_SIZE_MB = 5;
    const MAX_SIZE_BYTES = MAX_SIZE_MB * 1024 * 1024;

    if (input_file.files && input_file.files[0]) {
        const archivo = input_file.files[0];

        // 🚨 Nueva validación: Comprobar el tamaño del archivo
        if (archivo.size > MAX_SIZE_BYTES) {
            alert(
                `El archivo seleccionado es demasiado grande. El tamaño máximo permitido es de ${MAX_SIZE_MB} MB.`
            );
            // Limpiar el input para que el usuario pueda seleccionar otro archivo
            $(input_file).val(""); // Esto limpia el valor del input file en jQuery
            vista_previa.attr("src", "#"); // Opcional: restablecer el src
            vista_previa.hide(); // Ocultar la imagen si ya había una
            //console.log("Archivo rechazado por tamaño excesivo.");
            return; // Salir de la función
        }

        // Si el archivo es válido (pasa la comprobación de tamaño)
        const reader = new FileReader();

        reader.onload = function (e) {
            vista_previa.attr("src", e.target.result);
            vista_previa.show();
            if (archivo.size < 1024) {
                // si mide menos de 1 mega se muestra en kilobytes
                span_src.text((archivo.size / 1024).toFixed(2) + " KB");
            } else {
                span_src.text(
                    (archivo.size / (1024 * 1024)).toFixed(2) + " MB"
                );
            }

            span_src.show();
            //console.log("Imagen cargada y previsualizada.");
        };

        reader.readAsDataURL(archivo);
    } else {
        // No hay imagen seleccionada o el input está vacío
        vista_previa.attr("src", "#");
        vista_previa.hide();
        span_src.text("");
        span_src.hide();
        console.log("No hay imagen seleccionada o el input está vacío.");
    }
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

window.modalCompartir = (anuncio_id) => {
    $("#modal_compartir_" + anuncio_id).modal("show");
};
