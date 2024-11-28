<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categoría Inmuebles</title>
</head>

<body style="padding:20px;">
    <center>
        <img src="https://www.catinmo.com/img/logo.png" width="60%">
    </center>
    <h4>
        Se ha generado una denuncia en la publicación
        @php
            switch (strlen($denuncia->anuncio->id)) {
                case 1:
                    echo '0000' . $denuncia->anuncio->id;
                    break;
                case 2:
                    echo '000' . $denuncia->anuncio->id;
                    break;
                case 3:
                    echo '00' . $denuncia->anuncio->id;
                    break;
                case 4:
                    echo '0' . $denuncia->anuncio->id;
                    break;
                default:
                    echo $denuncia->anuncio->id;
            }
        @endphp
    </h4>
    <p>
        <b>Titúlo:</b> {{ $denuncia->anuncio->titulo }}
        <br><br>
        <b>Descripción:</b> {{ $denuncia->anuncio->descripcion }}
        <br><br>
        <b>Motivo de la denuncia:</b> {{ $denuncia->motivo }}
        <br><br>
        <b>IP:</b> {{ $denuncia->ip }}
    </p>
</body>

</html>
