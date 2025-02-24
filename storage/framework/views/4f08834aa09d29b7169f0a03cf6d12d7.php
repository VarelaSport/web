



<?php $__env->startSection('contenido'); ?>
<div class="espacion p-5"></div>
<div class="container mx-auto py-10">
    
        <div>
            <div class="header-table">
                <div class="titulo">
                    <h1 class="text-2xl font-bold mb-6">Detalles de ventas</h1>
                </div>
                <div class="relative flex justify-end bg-blue-600 mb-5">
                    <!-- Botón SVG -->
                        <button id="toggleMenu" class="p-4 bg-blue-600 rounded-full shadow-md hover:bg-blue-700 transition">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.00378 5.99561L15.004 11.9959L9.00024 17.9996" stroke="black" stroke-width="null" stroke-linecap="round" stroke-linejoin="round" class="my-path"></path>
                                </svg>
                        </button>
                    <?php echo $__env->make('PDF.components.modal-filtro', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            

            <?php if($ordenes->isEmpty()): ?>
                <p class="text-gray-700">No hay productos en este pedido.</p>
            <?php else: ?>
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2 text-left"># ID</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Producto</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Imagen</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Cantidad</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Precio</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $ordenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="odd:bg-white even:bg-gray-50">
                                    <td class="border border-gray-300 px-4 py-2"><?php echo e($detalle->producto_id); ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><?php echo e($detalle->nombre_producto); ?></td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <img src="<?php echo e(asset($detalle->imagen_uno)); ?>" alt="<?php echo e($detalle->imagen_uno); ?>" class="w-24 h-24 object-cover rounded-md">
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2"><?php echo e($detalle->cantidad_productos); ?></td>
                                    <td class="border border-gray-300 px-4 py-2">$<?php echo e(($detalle->precio_unidad)); ?></td>
                                    <td class="border border-gray-300 px-4 py-2">$<?php echo e($detalle->tota_precio); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
            <div class="flex justify-between items-center mt-6">
              <a href="/pedidos/listar" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-md">
                  Volver
              </a>           
            </div>
        </div>
    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('/base/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\VarelaAdmin\resources\views/PDF/resumen-filtro/filtro.blade.php ENDPATH**/ ?>