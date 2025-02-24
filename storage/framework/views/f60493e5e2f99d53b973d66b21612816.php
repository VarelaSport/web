


<?php $__env->startSection('contenido'); ?>
    <div class="container mx-auto py-20">               
        <div class="flex flex-col py-5">
            <div class=" overflow-x-auto pb-4">
                <div class="block">
                    <div class="overflow-x-auto w-full  border rounded-lg border-gray-300">
                        <?php if(Session::has('mensaje')): ?>
                                <?php echo e(Session::get('mensaje')); ?>

                            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                                <span class="font-medium">Reseña Aprobada</span>
                            </div>
                        <?php endif; ?> 
               
                        <?php if(empty($resenas)): ?>
                            No hay reseñas para mostrar
                        <?php else: ?> 
                            <table class="w-full rounded-xl">
                                <thead>
                                    <tr class="bg-gray-50">            
                                        <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize">ID</th>
                                        <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"> Nombre Cliente</th>
                                        <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"> Comentario</th>
                                        <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"> Fecha Creado </th>
                                        <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"> status </th>
                                        <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"> Acción </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-300 ">
                             <?php $__currentLoopData = $resenas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resena): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <tr class="bg-white transition-all duration-500 hover:bg-gray-50">
                                <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 "><?php echo e($resena->id); ?></td>
                                <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> <?php echo e($resena->nombre_cliente); ?> <?php echo e($resena->apellido_paterno_cliente); ?></td>
                                <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> <?php echo e($resena->comentario); ?> </td>
                                <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> <?php echo e($resena->fecha_creacion); ?> </td>
                                <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> <?php echo e($resena->status); ?> </td>
                                
                               
                                
                                <td class="flex flex-col p-5 items-center gap-2">
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="openModal()">Abrir Modal</button>
                                    <?php echo $__env->make('resenas.components.modal-accion', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    
                                </td>
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


<script>
    function openModal() {
        document.getElementById('modal').classList.remove('hidden');
    }
    
    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
    }
    
    function submitSelection() {
        let select = document.querySelector("select").value;
        if (select) {
            alert("Reseña " + select);
            closeModal();
        } else {
            alert("Por favor seleccione una opción.");
        }
    }
</script>
<?php echo $__env->make('/base/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\VarelaAdmin\resources\views/resenas/listar.blade.php ENDPATH**/ ?>