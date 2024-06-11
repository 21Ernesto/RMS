<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tique de Compra</title>
    <!-- Incluye la CDN de Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center" bgcolor="#f8f8f8">
                <table width="600" border="0" cellspacing="0" cellpadding="20">
                    <tr>
                        <td align="center" bgcolor="#ffffff">
                            <img src="{{ asset('assets/img/RMS-logotipo.png') }}" alt="Logo" width="150"
                                style="display:block;margin:0 auto;">
                            <h1 style="color: #1a202c; font-size: 24px; margin: 20px 0;">Rutas Mayas del Sureste</h1>
                            <p style="color: #718096; font-size: 14px;">
                                <strong>Fecha de compra:</strong> {{ $payment->created_at->format('Y-m-d H:i:s') }}
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#ffffff">
                            <h2 style="color: #1a202c; font-size: 18px;">Datos del cliente</h2>
                            <ul style="list-style: none; padding: 0; margin: 0;">
                                <li><strong>Folio:</strong> {{ $payment->uuid }}</li>
                                <li><strong>Nombre:</strong> {{ $payment->customer_name }}</li>
                                <li><strong>Correo:</strong> {{ $payment->customer_email }}</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#ffffff">
                            <h2 style="color: #1a202c; font-size: 18px;">Detalles de la compra</h2>
                            <ul style="list-style: none; padding: 0; margin: 0;">
                                <li><strong>Viaje:</strong> {{ $payment->trip_name }}</li>
                                <li><strong>Hotel:</strong> {{ $payment->hotel_name }}</li>
                                <li><strong>Fecha de entrada:</strong> {{ $payment->datestart }}</li>
                                <li><strong>Cantidad adultos:</strong> {{ $payment->quantity_adult }}</li>
                                <li><strong>Cantidad niños:</strong> {{ $payment->quantity_child }}</li>

                                <br><br>
                                <li><strong>Total:</strong> $ {{ $payment->total_real }} MXN</li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" bgcolor="#ffffff">
                            <p style="color: #718096; font-size: 14px;">Agradecemos su preferencia y quedamos a su
                                disposición para cualquier consulta o solicitud adicional.</p>
                            <p style="color: #718096; font-size: 14px;">Atentamente, <br> Rutas Mayas del Sureste <span
                                    style="font-weight: bold;">(RMS)</span></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</body>

</html>
