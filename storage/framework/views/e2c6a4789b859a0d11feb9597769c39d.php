

<?php $__env->startSection('contenido'); ?>
<div class="container mx-auto py-10">
    <?php if($ordenes->isEmpty()): ?>
        <p class="text-gray-700 text-center text-lg">No hay productos en este pedido.</p>
    <?php else: ?>
        <div class="overflow-x-auto shadow-md rounded-lg">
            <table class="w-full table-auto border-collapse border border-gray-200 bg-white">
                <thead>
                    <tr class="bg-gray-200 text-gray-700 text-sm uppercase">
                        <th class="border border-gray-300 px-4 py-3 text-left"># ID</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Producto</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Imagen</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Cantidad</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Precio</th>
                        <th class="border border-gray-300 px-4 py-3 text-left">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $ordenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="odd:bg-white even:bg-gray-100 hover:bg-gray-50 transition">
                            <td class="border border-gray-300 px-4 py-2 text-gray-700"><?php echo e($detalle->producto_id); ?></td>
                            <td class="border border-gray-300 px-4 py-2 text-gray-700"><?php echo e($detalle->nombre_producto); ?></td>
                            <td class="border border-gray-300 px-4 py-2 flex justify-center">
                                <?php if($detalle->imagen_uno): ?>
                                    <img src="<?php echo e(public_path('storage/imagenes/productos/' . basename($detalle->imagen_uno))); ?>" alt="Producto" class="w-16 h-16 object-cover rounded-md">
                                <?php else: ?>
                                    <span class="text-gray-500 text-sm">Sin imagen</span>
                                <?php endif; ?>
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-gray-700 text-center"><?php echo e($detalle->cantidad_productos); ?></td>
                            <td class="border border-gray-300 px-4 py-2 text-gray-700">$<?php echo e(number_format($detalle->precio_unidad, 2)); ?></td>
                            <td class="border border-gray-300 px-4 py-2 text-gray-700 font-semibold">$<?php echo e(number_format($detalle->tota_precio, 2)); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
    <div class="flex justify-center mt-6">
        <a href="/pedidos/listar" class="bg-gray-600 hover:bg-gray-700 text-white py-2 px-6 rounded-lg shadow-md transition">
            Volver
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('/base/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\VarelaAdmin\resources\views//PDF/ventaspdf.blade.php ENDPATH**/ ?>