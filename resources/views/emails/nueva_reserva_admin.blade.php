<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Reserva Pendiente - El Campito Zafra</title>
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

        .header .admin-tag {
            display: inline-block;
            margin-top: 10px;
            padding: 5px 12px;
            background-color: #d4a96a;
            color: white;
            font-size: 14px;
            border-radius: 4px;
        }

        /* Contenido */
        .content {
            padding: 30px 25px;
        }

        .alert-message {
            background-color: #f8f4e5;
            border-left: 4px solid #d4a96a;
            padding: 15px;
            margin-bottom: 25px;
            border-radius: 4px;
        }

        .user-info {
            background-color: #fafafa;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            padding: 20px;
            margin-bottom: 25px;
        }

        .user-info h2 {
            color: #8b6c42;
            font-size: 18px;
            margin-top: 0;
            margin-bottom: 15px;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 10px;
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
            font-size: 18px;
            margin-top: 0;
            margin-bottom: 15px;
            border-bottom: 1px solid #e0e0e0;
            padding-bottom: 10px;
            display: flex;
            align-items: center;
        }

        .status-tag {
            display: inline-block;
            margin-left: 10px;
            padding: 3px 8px;
            background-color: #f8f4e5;
            color: #8b6c42;
            font-size: 12px;
            border-radius: 4px;
            font-weight: 600;
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
            text-align: right;
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
            max-width: 300px;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 30px 0;
        }

        .action-button {
            padding: 12px 20px;
            border-radius: 6px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
        }

        .approve-button {
            background-color: #8b6c42;
            color: white;
        }

        .reject-button {
            background-color: #a9a9a9;
            color: white;
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
                text-align: left;
            }

            .action-buttons {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>
<body>
<div class="email-container">
    <!-- Cabecera -->
    <div class="header">
        <h1><strong>Alojamientos Rurales El Campito</strong></h1>
        <h1>Nueva Reserva Pendiente</h1>
        <span class="admin-tag">Panel Administrador</span>
    </div>

    <!-- Contenido principal -->
    <div class="content">
        <div class="alert-message">
            <strong>¡Atención!</strong> Se ha recibido una nueva solicitud de reserva que requiere tu aprobación.
        </div>

        <div class="user-info">
            <h2>Información del Cliente</h2>

            <div class="detail-row">
                <span class="detail-label">Nombre:</span>
                <span class="detail-value">{{ $reserva->usuario->name }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Email:</span>
                <span class="detail-value">{{ $reserva->usuario->email }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Teléfono:</span>
                <span class="detail-value">{{ $reserva->usuario->phone }}</span>
            </div>
        </div>

        <div class="reservation-details">
            <h2>
                Detalles de la Reserva
                <span class="status-tag">{{ $reserva->estado }}</span>
            </h2>

            <div class="detail-row">
                <span class="detail-label">Apartamento:</span>
                <span class="detail-value">{{ $reserva->apartamento->descripcion ?? 'Desconocido' }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Fecha de entrada:</span>
                <span class="detail-value">{{ $reserva->fecha_inicio->format('d/m/Y') }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Fecha de salida:</span>
                <span class="detail-value">{{ $reserva->fecha_fin->format('d/m/Y') }}</span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Noches:</span>
                <span class="detail-value">{{ $reserva->fecha_inicio->diffInDays($reserva->fecha_fin) }}</span>
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
            <p>Esta reserva está pendiente de aprobación. Por favor, revisa los detalles y confirma o rechaza la solicitud desde el panel de administración.</p>
        </div>

        <a href="{{ url('/admin/reservas') }}" class="cta-button">
            Ir al Panel de Administración
        </a>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Este es un mensaje automático del sistema de reservas de El Campito Zafra.</p>
        <p>© {{ date('Y') }} El Campito Zafra. Todos los derechos reservados.</p>

        <div class="footer-links">
            <a href="{{ url('/admin') }}" class="footer-link">Panel de Administración</a>
            <a href="{{ url('/admin/reservas') }}" class="footer-link">Gestionar Reservas</a>
        </div>
    </div>
</div>
</body>
</html>
