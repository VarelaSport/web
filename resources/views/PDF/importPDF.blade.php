<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Ventas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }
        img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
        }
        .title {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <h1 class="title">Resumen de Ventas</h1>

    @if ($ordenes->isEmpty())
        <p style="text-align: center; color: #777;">No hay productos en este pedido.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th># ID</th>
                    <th>Producto</th>
                    <th>Imagen</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ordenes as $detalle)
                    <tr>
                        <td>{{ $detalle->producto_id }}</td>
                        <td>{{ $detalle->nombre_producto }}</td>
                        <td>
                            @if($detalle->imagen_uno)
                                <img src="{{ public_path('storage/imagenes/productos/' . basename($detalle->imagen_uno)) }}" alt="Producto">
                            @else
                                Sin imagen
                            @endif
                        </td>
                        <td>{{ $detalle->cantidad_productos }}</td>
                        <td>${{ number_format($detalle->precio_unidad, 2) }}</td>
                        <td><strong>${{ number_format($detalle->tota_precio, 2) }}</strong></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</body>
</html>
