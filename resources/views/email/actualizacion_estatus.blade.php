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
    <h4>Estimad@ {{ $anuncio->cliente->name }} {{ $anuncio->cliente->apaterno }} {{ $anuncio->cliente->amaterno }}</h4>
    <p>
        Su anuncio con título {{ $anuncio->titulo }} ha sido actualizado a Premium
    </p>
    <p>
        Contáctanos
        <br><br>
        Teléfono: 55 55799356<br>
        Whatssap: 55 13900518<br>
    </p>
</body>

</html>
