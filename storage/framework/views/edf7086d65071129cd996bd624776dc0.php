<?php $__env->startSection('contenido'); ?>
<div class="container mx-auto py-12 px-6 lg:px-20">
  <form id="formulario" action="/Administrador/guardar" method="POST" autocomplete="on" enctype="multipart/form-data" class="space-y-6 bg-white p-8 shadow-lg rounded-lg">
    <?php echo csrf_field(); ?>

    <!-- Campo Avatar -->
    <div>
      <label for="img_perfil" class="block text-sm font-medium text-gray-700 mb-2">Imagen</label>
      <input type="file" id="img_perfil" name="img_perfil" accept="image/*">
      <span id="img_perfilValid" class="text-green-500 text-sm hidden">Tipo de imagen válido</span>
      <span id="fotoInvalid" class="text-red-500 text-sm hidden">Tipo de imagen no válido</span>
      <?php $__errorArgs = ['img_perfil'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <span id="fotoInvalid" class="text-red-500 text-sm"><?php echo e($message); ?></span>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div class="flex gap-x-6 mb-6">
      <!-- Campo Nombre -->
      <div class="w-full relative">
        <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo e(old('nombre')); ?>"
        class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none"
          placeholder="Ingresa el nombre">
        <?php $__errorArgs = ['nombre'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span id="nombreInvalid" class="text-red-500 text-sm"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      <!-- Campo Apellido -->
      <div class="w-full relative">
        <label for="apellido_paterno" class="block text-sm font-medium text-gray-700 mb-2">Apellido Paterno</label>
        <input type="text" id="apellido_paterno" name="apellido_paterno" value="<?php echo e(old('apellido_paterno')); ?>"
          class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none"
          placeholder="Ingresa el apellido">
        <?php $__errorArgs = ['apellido_paterno'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span id="apellidoInvalid" class="text-red-500 text-sm"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>
    
      <div class="w-full relative">
        <label for="apellido_materno" class="block text-sm font-medium text-gray-700 mb-2">Apellido Materno</label>
        <input type="text" id="apellido_materno" name="apellido_materno" value="<?php echo e(old('apellido_materno')); ?>"
          class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none"
          placeholder="Ingresa el apellido">
        <?php $__errorArgs = ['apellido_materno'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span id="apellidoInvalid" class="text-red-500 text-sm"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>
    </div>
    
    <div class="flex gap-x-6 mb-6">
        <!-- Campo Username -->
      <div>
        <label for="nombre_usuario" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
        <input type="text" id="username" name="nombre_usuario" value="<?php echo e(old('nombre_usuario')); ?>"
          class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none"
          placeholder="Ingresa el nombre de usuario">
        <?php $__errorArgs = ['nombre_usuario'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span id="usernameInvalid" class="text-red-500 text-sm"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>

      <!-- Campo Correo -->
      <div>
        <label for="correo" class="block text-sm font-medium text-gray-700 mb-2">Correo</label>
        <input type="email" id="correo" name="correo" value="<?php echo e(old('correo')); ?>"
          class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none"
          placeholder="Ingresa el correo">
        <?php $__errorArgs = ['correo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span id="correoInvalid" class="text-red-500 text-sm"><?php echo e($message); ?></span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>
    </div>
    

    <div>
      <label for="rango_id" class="block text-sm font-medium text-gray-700 mb-2">Rango</label>
      <select name="rango_id" id="rango_id" class="block w-1/3 h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none">
        <option value="3">Selecciona</option>
        <option value="1">Super Admin</option>
        <option value="2">Medio Admin</option>
        <option value="3">Base</option>
      </select>
      <?php $__errorArgs = ['rango_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <span id="rangoInvalid" class="text-red-500 text-sm"><?php echo e($message); ?></span>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <!-- Campo Contraseña -->
    <div>
      <label for="contrasena" class="block text-sm font-medium text-gray-700 mb-2">Contraseña</label>
      <input type="password" id="contrasena" name="contrasena"
        class="block w-1/3 h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none"
        placeholder="Ingresa la contraseña">
      <?php $__errorArgs = ['contrasena'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <span id="contrasenaInvalid" class="text-red-500 text-sm"><?php echo e($message); ?></span>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <div>
      <label for="domicilio" class="block text-sm font-medium text-gray-700 mb-2">Domicilio</label>
      <textarea name="domicilio" id="domicilio" cols="30" rows="10" class="block w-full h-12 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-50 placeholder-gray-400 focus:outline-none">
      </textarea>
      <?php $__errorArgs = ['domicilio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
      <span id="domicilioInvalid" class="text-red-500 text-sm"><?php echo e($message); ?></span>
      <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </div>

    <!-- Botones de acción -->
    <div class="flex gap-4 items-center">
      <input type="submit" value="Crear Admin"
        class="w-full sm:w-auto px-6 py-3 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-800 transition duration-300">
      <a href="/Administrador/listado"
        class="px-6 py-3 bg-gray-300 text-gray-700 rounded-lg shadow hover:bg-gray-400 transition duration-300 text-center">Cancelar</a>
    </div>
  </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('/base/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Andrea\Desktop\varela\cuatrifinalizado\cuatrifinalizado\VarelaAdmin\resources\views/administrador/crear.blade.php ENDPATH**/ ?>