



<?php $__env->startSection('contenido'); ?>
<div class="ccontainer mx-auto py-20">
<form action="/producto/<?php echo e($productos->producto_id); ?>/actualizar" method="POST"  class="" autocomplete="on">
<?php echo method_field('PUT'); ?> 
<?php echo csrf_field(); ?>

<?php if($productos->existencia === 0): ?>
        <div class="py-1.5 px-2.5 bg-amber-50 rounded-full flex items-center justify-center w-20 gap-1">
            <svg width="5" height="6" viewBox="0 0 5 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="2.5" cy="3" r="2.5" fill="#D97706"></circle>
            </svg>
            <span class="font-medium text-xs text-amber-600 ">Agotado</span>
        </div>
        <?php else: ?>
        <div class="py-1.5 px-2.5 bg-emerald-50 rounded-full flex justify-center w-20 items-center gap-1">
            <svg width="5" height="6" viewBox="0 0 5 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="2.5" cy="3" r="2.5" fill="#059669"></circle>
            </svg>
            <p>Activo</p>
        </div>
        <?php endif; ?>

      <div class="mt-3 flex gap-x-6 mb-6">
        <div class="w-full relative">
          <label for="nombre" class="flex  items-center mb-2 text-gray-600 text-sm font-medium">Nombre <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z" fill="#EF4444" />
            </svg>
          </label>
          <input type="text" id="nombre" name="nombre_producto"
          class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none" placeholder="" value="<?php echo e($productos->nombre_producto); ?>" required>
          <span id="nombreValid" class="nombreValid text-green-500 text-sm hidden">Es correcto</span>
          <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <span id="nombreInvalid" class="nombreInvalid text-red-500 text-sm hidden"><?php echo e($message); ?></span>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
      </div>

      <div class="w-full relative">
        <label class="flex  items-center mb-2 text-gray-600 text-sm font-medium">Descripción <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z" fill="#EF4444" />
          </svg>
        </label>
        <textarea name="descripcion_producto" id="descripcion_producto" cols="30" rows="10" class="block w-full h-20 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-50 placeholder-gray-400 focus:outline-none">
          <?php echo e($productos->descripcion_producto); ?>

        </textarea>
        <span id="descripcionValid" class="text-green-500 text-sm hidden">Es correcto</span>
        <?php $__errorArgs = ['descripcion_producto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span id="descripcionInvalid" class="text-red-500 text-sm hidden"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>
      
      <div class="flex gap-x-6 mt-5">
      <div class="w-full relative">
        <label class="flex  items-center mb-2 text-gray-600 text-sm font-medium">Precio <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z" fill="#EF4444" />
          </svg>
        </label>
        <input type="number" id="precio" name="precio" 
        class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none "  placeholder="" value="<?php echo e($productos->precio); ?>">
        <span id="precioValid" class="text-green-500 text-sm hidden">Es correcto</span>
        <?php $__errorArgs = ['precio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span id="precioInvalid" class="text-red-500 text-sm hidden"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      <div class="w-full relative">
        <label class="flex  items-center mb-2 text-gray-600 text-sm font-medium"> Existencia <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z" fill="#EF4444" />
          </svg>
        </label>
        <input type="number" id="existencia" name="existencia" 
        class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none " value="<?php echo e($productos->existencia); ?>">
        <span id="existenciaValid" class="text-green-500 text-sm hidden">Es correcto</span>
        <?php $__errorArgs = ['existencia'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span id="existenciaInvalid" class="text-red-500 text-sm hidden"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>
    </div>

      <div class="flex gap-x-6 mt-5">
        <div class="w-full relative">
          <label class="flex  items-center mb-2 text-gray-600 text-sm font-medium" for="categoria_principal_id">Categoria <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z" fill="#EF4444" />
            </svg>
          </label>
          <p class="mb-3">Categoria anterior: <?php echo e($productos->categoria_principal_id); ?></p>
          <select name="categoria_principal_id" id="categoria_principal_id" class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none">
            <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
            <option value="<?php echo e($categoria->id); ?>"><?php echo e($categoria->nombre); ?></option>
            
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
          <span id="categoriaValid" class="text-green-500 text-sm hidden">Es correcto</span>
          <?php $__errorArgs = ['categoria_principal_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <span id="categoria_principal_idInvalid" class="categoria_principal_idInvalid text-red-500 text-sm">*<?php echo e($message); ?></span>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
  
        <div class="w-full relative">
          <label for="descuento_id" class="flex  items-center mb-2 text-gray-600 text-sm font-medium">Descuento <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z" fill="#EF4444" />
              </svg>
          </label>
          <p class="mb-3"><?php echo e($productos->tipo); ?>: <?php echo e($productos->valor); ?>  Descuento: <?php echo e($productos->descripcion_descuento); ?></p>
          <select id="descuento_id" name="descuento_id" class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none">
            <?php $__currentLoopData = $descuentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $descuento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($descuento->id); ?>"><?php echo e($descuento->tipo); ?> : <?php echo e($descuento->valor); ?></option>
            
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
          <span id="descuento_idValid" class="text-green-500 text-sm hidden">Es correcto</span>
          <?php $__errorArgs = ['descuento_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <span id="descuento_idInvalid" class="descuento_idInvalid text-red-500 text-sm">*<?php echo e($message); ?></span>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        </div>
    </div>

    <div class="w-full flex space-x-4">
      <div class="relative flex-1">
        <label class="flex items-center mb-2 text-gray-600 text-sm font-medium">Imagen uno
          <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg"></svg>
        </label>
        <img src="<?php echo e(asset($productos->imagen_producto_uno)); ?>" alt="" class="w-1/3 h-30 shadow-lg rounded-md">
        
        
      </div>
    
      <div class="relative flex-1">
        <label class="flex items-center mb-2 text-gray-600 text-sm font-medium">Imagen dos
          <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg"></svg>
        </label>
        <img src="<?php echo e(asset($productos->imagen_producto_dos)); ?>" alt="" class="w-1/3 h-30 shadow-lg rounded-md">
        
      </div>
    
      <div class="relative flex-1">
        <label class="flex items-center mb-2 text-gray-600 text-sm font-medium">Imagen tres
          <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg"></svg>
        </label>
        <img src="<?php echo e(asset($productos->imagen_producto_tres)); ?>" alt="" class="w-1/3 h-30 shadow-lg rounded-md">
        
      </div>
    </div>
 
      <br>
      <div class="flex gap-x-6 mb-6 mt-6">
        <a href="/producto/listar" class='py-4 px-6 w-52 h-12 text-sm bg-red-100 text-red-500 rounded-full cursor-pointer font-semibold text-center shadow-xs transition-all duration-500 hover:bg-red-100 hover:text-red-700'>Salir</a>
        <input type="submit" value="Editar Producto" class='mb-5 w-52 h-12 shadow-sm rounded-full bg-green-600 hover:bg-indigo-800 transition-all duration-700 text-white text-base font-semibold leading-7'>                
      </div>

    </form>
</div>

<!-- <script src="/crear.js"></script> -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('/base/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\VarelaAdmin\resources\views//producto/editar.blade.php ENDPATH**/ ?>