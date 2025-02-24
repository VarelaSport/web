





<?php $__env->startSection('contenido'); ?>

    <div class="container mx-auto py-20">
        <div class="flex flex-col py-5">
            <div class=" overflow-x-auto pb-4">
                <div class="block">

                    <div class="icono-ventas flex items-center justify-center bg-white p-4 mb-3 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                        <a href="/resumenVentas" class="flex flex-col items-center text-gray-700 hover:text-blue-600">
                            <div class="bg-blue-100 p-3 rounded-full">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8 h-8">
                                    <path d="M18.5 9C19.8807 9 21 10.1193 21 11.5V15C21 17.8284 21 19.2426 20.1213 20.1213C19.2426 21 17.8284 21 15 21H9C6.17157 21 4.75736 21 3.87868 20.1213C3 19.2426 3 17.8284 3 15V11.5C3 10.1193 4.11929 9 5.5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                                    <path d="M12 16L7.80408 11.804M12 16L16.196 11.804M12 16V3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </div>
                            <p class="mt-2 text-lg font-semibold">Resumen ventas</p>
                        </a>
                    </div>
            
                    <div class="overflow-x-auto w-full  border rounded-lg border-gray-300">
                        <?php if(Session::has('mensaje')): ?>
                                <?php echo e(Session::get('mensaje')); ?>

                            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                                <span class="font-medium">PEDIDO REGISTRADO</span>
                            </div>
                        <?php endif; ?> 
               
                        <?php if(empty($ordenes)): ?>
                            No hay Pedidos para mostrar
                        <?php else: ?> 
                        
                            <table class="w-full rounded-xl">
                                <thead>
                                    <tr class="bg-gray-50">            
                                        <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize">Id orden</th>
                                        <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"> Cliente</th>
                                        <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"> Administrador</th>
                                        <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"> Metodo de Pago</th>
                                        <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"> Total </th>
                                        <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"> Fecha de Compra </th>
                                        <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"> Estatus </th>
                                        <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"> Acción </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-300 ">
                             <?php $__currentLoopData = $ordenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orden): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <tr class="bg-white transition-all duration-500 hover:bg-gray-50">
                                <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 "><?php echo e($orden->orden_id); ?></td>
                                <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> <?php echo e($orden->nombre_cliente); ?> </td>
                                
                                <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> <?php echo e($orden->nombre_administrador); ?> </td>
                                <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"><?php echo e($orden->nombre_metodoPago); ?> </td>
                                <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"><?php echo e($orden->totalOrden); ?> </td>
                                <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"><?php echo e($orden->fecha_compra); ?> </td>
                                                   
                                <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                    <?php if($orden->estatus === 'activo'): ?>
                                        <div class="py-1.5 px-2.5 bg-amber-50 rounded-full flex items-center justify-center w-20 gap-1">
                                            <svg width="5" height="6" viewBox="0 0 5 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="2.5" cy="3" r="2.5" fill="#D97706"></circle>
                                            </svg>
                                            <span class="font-medium text-xs text-amber-600 ">Pago pendiente</span>
                                        </div>
                                        <?php elseif($orden->estatus === 'Pagado'): ?>
                                        <div class="py-1.5 px-2.5 bg-green-100 rounded-full flex items-center justify-center w-20 gap-1">
                                            <svg width="5" height="6" viewBox="0 0 5 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="2.5" cy="3" r="2.5" fill="#059669"></circle>
                                            </svg>
                                            <span class="font-medium text-xs text-green-600 ">Pagado</span>
                                        </div>
                                        <?php else: ?>
                                        <div class="py-1.5 px-2.5 bg-red-100 rounded-full flex justify-center w-20 items-center gap-1">
                                            <svg width="5" height="6" viewBox="0 0 5 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="2.5" cy="3" r="2.5" fill="#059669"></circle>
                                            </svg>
                                            <p class="font-medium text-xs text-red-600">Cancelado</p>
                                        </div>
                                    <?php endif; ?>      
                                </td>
                                
                                <?php if($orden->estatus === 'activo'): ?>
                                    <td class="flex flex-col p-5 items-center gap-2">
                                        <a href="/pedidos/<?php echo e($orden->orden_id); ?>/mostrar">
                                            <svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M2.45448 13.8008C1.84656 12.6796 1.84656 11.3204 2.45447 10.1992C4.29523 6.80404 7.87965 4.5 11.9999 4.5C16.1202 4.5 19.7046 6.80404 21.5454 10.1992C22.1533 11.3204 22.1533 12.6796 21.5454 13.8008C19.7046 17.196 16.1202 19.5 11.9999 19.5C7.87965 19.5 4.29523 17.196 2.45448 13.8008Z" stroke="black" stroke-width="1.2" class="my-path"></path>
                                                <path d="M15.0126 11.9551C15.0126 13.6119 13.6695 14.9551 12.0126 14.9551C10.3558 14.9551 9.01263 13.6119 9.01263 11.9551C9.01263 10.2982 10.3558 8.95508 12.0126 8.95508C13.6695 8.95508 15.0126 10.2982 15.0126 11.9551Z" stroke="black" stroke-width="1.2" class="my-path"></path>
                                            </svg>
                                        </a>
                                    </td>
                                    <?php elseif($orden->estatus === 'Pagado'): ?>
                                    <td class="flex flex-col p-5 items-center gap-2">
                                            <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M4 12.4434L8.14339 16.5868C8.81006 17.2535 9.14339 17.5868 9.5576 17.5868C9.97182 17.5868 10.3051 17.2535 10.9718 16.5868L20.001 7.55762"
                                                stroke="black" stroke-width="1.6" stroke-linecap="round" class="my-path">
                                            </path>
                                        </svg>
                                    </td>
                                    <?php else: ?>
                                    <td class="flex flex-col p-5 items-center gap-2">
                                        <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.75732 7.75745L16.2426 16.2427" stroke="black" stroke-width="1.6"
                                                stroke-linecap="round" class="my-path"></path>
                                            <path d="M16.2426 7.75745L7.75732 16.2427" stroke="black" stroke-width="1.6"
                                                stroke-linecap="round" class="my-path"></path>
                                        </svg>
                                    </td>
                                <?php endif; ?>
                                
                            </tr>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                 
                        </tbody>
                            </table>
                         <?php endif; ?>
                    </div>

                    

                </div>
            </div>
        </div>
    </div>    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('/base/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\VarelaAdmin\resources\views//pedidos/listar.blade.php ENDPATH**/ ?>