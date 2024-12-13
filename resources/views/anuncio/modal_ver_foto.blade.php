<style>
    #modal_ver_foto {
        display: none;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100vh;
        background-color: black;
        padding: 20px;
        padding-top: 100px;
    }
</style>

<div id="modal_ver_foto">
    <a href="javascript:void(0)" onclick="ocultarFoto();">
        Cerrar
    </a>
    <center>
        <div style="width:50%;height: 75vh;padding:10px;overflow:hidden;overflow-y:scroll;">
            <img src="http://anuncios_laravel.test/storage/fotos_anuncios/G7Cy6TkO1ewjnJpQC5yGHE8xuAaFReuB3OLMr16f.jpg"
                width="100%" id="img_ver_foto" />
        </div>
    </center>
</div>
