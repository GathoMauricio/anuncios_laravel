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
        Se ha generado su nuevo anuncio con título: <strong>{{ $anuncio->titulo }}</strong>
        <br><br>
        Le recordamos que puede destacar su anuncio y recibir los siguientes beneficios:
        <br>
    <ul>
        <li>En los primeros lugares de su categoría</li>
        <li>Triple de visitas</li>
        <li>Hasta 20 fotos</li>
        <li>Durante 30 días</li>
        <li>Solo por $399.00 mxn</li>
    </ul>
    <br>
    Contamos con pago con Tarjeta por medio de
    <strong>STRIPE</strong> la pasarela de pago más segura de internet dentro de nuestra plataforma
    <br><br>
    y pagos en efectivo en tu tienda <strong>OXXO</strong> más cercana a las siguentes cuentas
    <br>
    BANCO: <strong>Santander</strong>
    <br>
    CUENTA: <strong>6551004136-2</strong>
    <br>
    CONCEPTO: <strong>catinmo_<span>{{ $anuncio->id }}</span></strong>
    <br>
    MONTO: <strong>$399 MXN</strong>
    <hr>
    BANCO: <strong>HSBC</strong>
    <br>
    CUENTA: <strong>406 669 4308</strong>
    <br>
    CONCEPTO: <strong>catinmo_<span>{{ $anuncio->id }}</span></strong>
    <br>
    MONTO: <strong>$399 MXN</strong>
    <hr>
    <br><br>
    o si lo prefieres via Transferencia electrónica
    <strong>SPEI</strong> con los siguientes datos:
    <br><br>
    BANCO: <strong>HSBC</strong>
    <br>
    CLIENTE: <strong>Comercializadora Arm21 sa de cv</strong>
    <br>
    CLABE: <strong>0211 8004&nbsp;0666&nbsp;9430&nbsp;88</strong>
    <br>
    CONCEPTO: <strong>catinmo_<span id="span_spein_id">{{ $anuncio->id }}</span></strong>
    <br>
    MONTO: <strong>$399 MXN</strong>
    <br>
    <br>
    Es importante que al realizar la transferencia nos hagas el favor de enviar tu comprobante de pago
    con el asunto <strong>"Pago catinmo_{{ $anuncio->id }}"</strong>
    al siguente correo electrónico <a href="mailto:ventas@arm21.mx">ventas@arm21.mx</a>
    <br>o al WhatssApp
    <strong>55 13900518</strong> para poder validar
    y actualizar el estatus de tu anuncio a la brevedad.
    </p>
    <p>
        Contáctanos
        <br><br>
        Dirección: Eleuterio Méndez 1540<br>
        Col. San Simón Ticumac<br>
        Benito Juárez, 03660<br>
        CDMX, México.<br>
        Teléfono: 55 55799356<br>
        Whatssap: 55 13900518<br>
    </p>
</body>

</html>
