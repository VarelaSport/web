



<?php $__env->startSection('contenido'); ?>
<br>
<br>
<br>
<div class="container mx-auto py-10">
    

        <div>
            <h1 class="text-2xl font-bold mb-6">Detalles del Pedido #<?php echo e($orden->id); ?></h1>

            <?php if($productos_pedidos->isEmpty()): ?>
                <p class="text-gray-700">No hay productos en este pedido.</p>
            <?php else: ?>
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2 text-left">Producto</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Descripción</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Imagen</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Cantidad</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Precio</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Total</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Marcado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $productos_pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detalle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="odd:bg-white even:bg-gray-50">
                                    <td class="border border-gray-300 px-4 py-2"><?php echo e($detalle->nombre); ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><?php echo e($detalle->descripcion); ?></td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <img src="<?php echo e(asset($detalle->image1)); ?>" alt="<?php echo e($detalle->image1); ?>" class="w-24 h-24 object-cover rounded-md">
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2"><?php echo e($detalle->total_cantidad); ?></td>
                                    <td class="border border-gray-300 px-4 py-2">$<?php echo e(number_format($detalle->precio, 2)); ?></td>
                                    <td class="border border-gray-300 px-4 py-2">$<?php echo e(number_format($detalle->total_cantidad * $detalle->precio, 2)); ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><input type="checkbox" name="listo" id="lisato"></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
            <div class="flex justify-between items-center mt-6">
              <h3 class="text-lg font-semibold text-gray-800">
                  Total Pedido: $<?php echo e(number_format($orden->total, 2)); ?>

              </h3>
              <a href="/pedidos/listar" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-md">
                  Volver
              </a>

              <form action="/pedidos/<?php echo e($orden->id); ?>/actualizar" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?> 
                <label for="numero_operacion">
                    Numero Operacion
                </label>
                <input type="number" name="numero_operacion" class="border border-gray-300 rounded-md px-3 py-2" >
                
                <label for="fecha_trasferencia">
                    Fecha Transferencia
                </label>
                <input type="date" name="fecha_trasferencia" class="border border-gray-300 rounded-md px-3 py-2" >
                
                <label for="hora_trasferencia">
                    Hora Transferencia
                </label>
                <input type="time" name="hora_trasferencia" class="border border-gray-300 rounded-md px-3 py-2" >

                <label for="concepto">
                    Concepto
                </label>
                <input type="number" name="concepto" class="border border-gray-300 rounded-md px-3 py-2" >
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">
                    Registrar Pago
                </button>
            </form>
            
          </div>
        </div>
    
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('/base/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Andrea\Desktop\varela\cuatrifinalizado\cuatrifinalizado\VarelaAdmin\resources\views/pedidos/mostrar.blade.php ENDPATH**/ ?>