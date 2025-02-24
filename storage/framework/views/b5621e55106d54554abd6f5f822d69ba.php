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

    <?php if($ordenes->isEmpty()): ?>
        <p style="text-align: center; color: #777;">No hay productos en este pedido.</p>
    <?php else: ?>
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
                <?php $__currentLoopData = $ordenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($detalle->producto_id); ?></td>
                        <td><?php echo e($detalle->nombre_producto); ?></td>
                        <td>
                            <?php if($detalle->imagen_uno): ?>
                                <img src="<?php echo e(public_path('storage/imagenes/productos/' . basename($detalle->imagen_uno))); ?>" alt="Producto">
                            <?php else: ?>
                                Sin imagen
                            <?php endif; ?>
                        </td>
                        <td><?php echo e($detalle->cantidad_productos); ?></td>
                        <td>$<?php echo e(number_format($detalle->precio_unidad, 2)); ?></td>
                        <td><strong>$<?php echo e(number_format($detalle->tota_precio, 2)); ?></strong></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\VarelaAdmin\resources\views/PDF/importPDF.blade.php ENDPATH**/ ?>