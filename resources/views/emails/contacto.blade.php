<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario de contacto</title>
</head>
<body>
    <h4>Esta consulta ha sido enviada desde el formulario de <span style="color:#4D9FC0; font-weight: bold;">Agenda malvinas</span></h4>

    <h2>Informacion de contacto</h2>

    <p><strong>Nombre:</strong> {{$contacto['name']}}</p>
    <p><strong>Email:</strong> {{$contacto['email']}}</p>
    <p><strong>Mensaje:</strong> {{$contacto['comment']}}</p>
</body>
</html>