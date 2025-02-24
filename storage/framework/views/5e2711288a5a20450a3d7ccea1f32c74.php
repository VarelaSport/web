

    <?php echo csrf_field(); ?>
    <div id="modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96 relative">
            <button class="absolute top-2 right-2 text-gray-600 hover:text-gray-900" onclick="closeModal()">✖</button>
            <form action="/resenas/<?php echo e($resena->id); ?>/actualizar" method="post" class="d-inline">
                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>
                <h2 class="text-lg font-semibold mb-4 text-center">¿Aprobar o rechazar la reseña?</h2>
                <p class="mb-4 text-gray-700 text-center"><?php echo e($resena->comentario); ?></p>
                <p class="hidden"><?php echo e($resena->id); ?></p>
                <div class="flex flex-col space-y-4">
                    <select class="w-full p-2 border rounded" name="status" id="status">
                        <option value="">Seleccione una opción</option>
                        <option value="aprobado">Aprobar</option>
                        <option value="rechazado">Rechazar</option>
                    </select>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded w-full shadow-md" onclick="submitSelection()">Aceptar</button>
                </div>
            </form>
        </div>
    </div>



<?php /**PATH C:\xampp\htdocs\VarelaAdmin\resources\views/resenas/components/modal-accion.blade.php ENDPATH**/ ?>