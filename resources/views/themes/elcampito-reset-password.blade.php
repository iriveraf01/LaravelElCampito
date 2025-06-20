<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña - El Campito Zafra</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f4e5;
            margin: 0;
            padding: 0;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #e0e0e0;
        }
        .header {
            background-color: #d4a96a;
            padding: 20px;
            text-align: center;
            color: #ffffff;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            color: #8b6c42;
        }
        .header img {
            max-width: 150px;
            height: auto;
            margin-bottom: 10px;
        }
        .content {
            padding: 30px;
            color: #333333;
            line-height: 1.6;
        }
        .content p {
            margin-bottom: 15px;
        }
        .button-container {
            text-align: center;
            margin: 20px 0;
        }
        .button {
            display: inline-block;
            background-color: #f5a93c;
            color: #ffffff;
            padding: 12px 25px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
        }
        .footer {
            background-color: #f0f0f0;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #666666;
            border-top: 1px solid #e0e0e0;
        }
        .footer p {
            margin: 0;
        }
        .logo-text {
            color: #8b6c42;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1 style="color: #8b6c42;"><strong>Alojamientos Rurales El Campito</strong></h1>
        <h1 style="color: #8b6c42;">Restablecer Contraseña</h1>
    </div>
    <div class="content">
        <p>Estás recibiendo este correo electrónico porque hemos recibido una solicitud de restablecimiento de contraseña para tu cuenta.</p>
        <div class="button-container">
            <a href="{{ $actionUrl }}" class="button text-white">Restablecer Contraseña</a>
        </div>
        <p>Este enlace de restablecimiento de contraseña caducará en {{ $expireMinutes }} minutos.</p>
        <p>Si no solicitaste un restablecimiento de contraseña, no se requiere ninguna acción adicional.</p>
        <p>Saludos cordiales.<br>El equipo de <span class="logo-text">El Campito Zafra</span>.</p>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} El Campito Zafra. Todos los derechos reservados.</p>
    </div>
</div>
</body>
</html>

