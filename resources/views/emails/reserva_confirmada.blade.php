<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva Confirmada - El Campito Zafra</title>
    <style>
        /* Estilos generales */
        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #4b4b4b;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        /* Contenedor principal */
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
        }

        /* Cabecera */
        .header {
            background-color: #f8f4e5;
            border-bottom: 3px solid #d4a96a;
            padding: 25px 20px;
            text-align: center;
        }

        .header img {
            max-width: 180px;
            margin-bottom: 15px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
            color: #8b6c42;
        }

        /* Contenido */
        .content {
            padding: 30px 25px;
        }

        .greeting {
            font-size: 18px;
            margin-bottom: 25px;
        }

        .confirmation-message {
            background-color: #f8f4e5;
            border-left: 4px solid #d4a96a;
            padding: 15px;
            margin-bottom: 25px;
            border-radius: 4px;
        }

        .reservation-details {
            background-color: #fafafa;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .reservation-details h2 {
            color: #8b6c42;
            font-size: 20px;
            margin-top: 0;
            margin-bottom: 15px;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 10px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            border-bottom: 1px dashed #e0e0e0;
            padding-bottom: 12px;
        }

        .detail-row:last-child {
            border-bottom: none;
            padding-bottom: 0;
            margin-bottom: 0;
        }

        .detail-label {
            font-weight: 600;
            color: #666666;
        }

        .detail-value {
            font-weight: 500;
        }

        .total-row {
            background-color: #f8f4e5;
            padding: 12px;
            border-radius: 6px;
            font-weight: 700;
            font-size: 18px;
            color: #8b6c42;
            margin-top: 15px;
            text-align: right;
        }

        .message {
            margin-bottom: 25px;
        }

        .cta-button {
            display: block;
            background-color: #d4a96a;
            color: white;
            text-decoration: none;
            padding: 14px 24px;
            border-radius: 6px;
            font-weight: 600;
            text-align: center;
            margin: 30px auto;
            max-width: 250px;
        }

        /* Información adicional */
        .additional-info {
            background-color: #fafafa;
            padding: 20px 25px;
            border-top: 1px solid #e0e0e0;
        }

        .additional-info h3 {
            color: #8b6c42;
            font-size: 18px;
            margin-top: 0;
            margin-bottom: 15px;
        }

        .info-item {
            margin-bottom: 10px;
            display: flex;
        }

        .info-icon {
            margin-right: 10px;
            color: #d4a96a;
            min-width: 20px;
            text-align: center;
        }

        /* Footer */
        .footer {
            background-color: #f8f4e5;
            padding: 20px;
            text-align: center;
            color: #8b6c42;
            font-size: 14px;
            border-top: 1px solid #e0e0e0;
        }

        .social-links {
            margin: 15px 0;
        }

        .social-link {
            display: inline-block;
            margin: 0 8px;
            color: #d4a96a;
            text-decoration: none;
        }

        .footer-links {
            margin: 15px 0;
        }

        .footer-link {
            color: #8b6c42;
            text-decoration: none;
            margin: 0 8px;
        }

        /* Responsive */
        @media only screen and (max-width: 600px) {
            .header {
                padding: 20px 15px;
            }

            .content {
                padding: 20px 15px;
            }

            .header h1 {
                font-size: 22px;
            }

            .detail-row {
                flex-direction: column;
            }

            .detail-value {
                margin-top: 5px;
            }
        }
    </style>
</head>
<body>
<div class="email-container">
    <!-- Cabecera -->
    <div class="header">
        <h1><strong>Alojamientos Rurales El Campito</strong></h1>
        <h1>¡Tu Reserva ha sido Confirmada!</h1>
    </div>

    <!-- Contenido principal -->
    <div class="content">

        <div class="confirmation-message">
            <strong>¡Buenas noticias!</strong> Tu reserva para el apartamento ha sido confirmada correctamente. Estamos deseando recibirte en El Campito Zafra.
        </div>

        <div class="reservation-details">
            <h2>Detalles de tu Reserva</h2>

            <div class="detail-row">
                <span class="detail-label">Apartamento:</span>
                <span class="detail-value">{{ $reserva->apartamento->descripcion }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Fecha de entrada:</span>
                <span class="detail-value">{{ \Carbon\Carbon::parse($reserva->fecha_inicio)->format('d/m/Y') }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Fecha de salida:</span>
                <span class="detail-value">{{ \Carbon\Carbon::parse($reserva->fecha_fin)->format('d/m/Y') }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Noches:</span>
                <span class="detail-value">{{ \Carbon\Carbon::parse($reserva->fecha_inicio)->diffInDays(\Carbon\Carbon::parse($reserva->fecha_fin)) }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Personas:</span>
                <span class="detail-value">{{ $reserva->personas }}</span>
            </div>

            <div class="total-row">
                <span class="detail-label">Total a pagar:</span>
                <span class="detail-value">€{{ number_format($reserva->total, 2) }}</span>
            </div>
        </div>

        <div class="message">
            <p>Recuerda que el horario de entrada es a partir de las <strong>12:00h</strong> del mediodía y la salida debe realizarse antes de las <strong>12:00h</strong> del día de partida.</p>
            <p>Si necesitas cualquier información adicional o tienes alguna petición especial, no dudes en contactarnos.</p>
        </div>

        <a href="{{ route('reservas.index') }}" class="cta-button">Ver mis reservas</a>
    </div>

    <!-- Información adicional -->
    <div class="additional-info">
        <h3>Información de contacto</h3>

        <div class="info-item">
            <span class="info-icon">📍</span>
            <span>Carr. Lapa, s/n, Km 1,2, 06300 Zafra, Badajoz</span>
        </div>

        <div class="info-item">
            <span class="info-icon">📞</span>
            <span>+34 637 84 13 80</span>
        </div>

        <div class="info-item">
            <span class="info-icon">✉️</span>
            <span>info@elcampitozafra.com</span>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>© {{ date('Y') }} El Campito Zafra. Todos los derechos reservados.</p>
    </div>
</div>
</body>
</html>
