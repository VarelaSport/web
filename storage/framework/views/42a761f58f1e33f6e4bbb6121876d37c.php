<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/pagedone@1.2.2/src/css/pagedone.css " rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <?php echo $__env->yieldContent('estilos'); ?>
    <title>Valera Sport</title>

</head>
<body class="bg-gray-100">
  <div class="w-full">
      <nav class="fixed top-0 left-0 w-full bg-blue-500 shadow-lg z-50">
          <div class="container mx-auto px-4 lg:px-8">
              <div class="flex justify-between items-center h-16">
                  <!-- Logo -->
                  <a href="/plantilla" class="flex items-center">
                      <img width="164" height="33" src="/asset/img/logoVarela.png" alt="Logo">
                  </a>

                  <!-- Mobile Menu Button -->
                  <button data-collapse-toggle="navbar-default-with-search" type="button" class="lg:hidden inline-flex items-center p-2 text-gray-100 hover:bg-blue-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300">
                      <span class="sr-only">Abrir Menu</span>
                      <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M3 5h14a1 1 0 010 2H3a1 1 0 010-2zm0 5h14a1 1 0 010 2H3a1 1 0 010-2zm0 5h14a1 1 0 010 2H3a1 1 0 010-2z" clip-rule="evenodd"></path>
                      </svg>
                  </button>

                  <!-- Nav Links -->
                  <div class="hidden lg:flex lg:items-center lg:gap-6" id="navbar-default-with-search">
                      <ul class="flex gap-6 text-sm text-white font-medium">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('SuperAdmin')): ?>
                            <li><a href="/Administrador/listado" class="hover:text-indigo-300 transition"> Administradores </a></li>
                            <?php endif; ?>

                          <li><a href="/cliente/listar" class="hover:text-indigo-300 transition"> Clientes </a></li>
                          <li><a href="/producto/listar" class="hover:text-indigo-300 transition"> Productos </a></li>
                          <li><a href="/pedidos/listar" class="hover:text-indigo-300 transition"> Pedidos </a></li>
                          <li>
                                <form action="/admin/logout" method="POST" class="ml-6">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="text-red-600">Salir</button>
                                </form>
                          </li>
                      </ul>

                  </div>
              </div>
          </div>
      </nav>

      <!-- Contenido dinámico -->
      <div class="mt-20">
          <?php echo $__env->yieldContent('contenido'); ?>
      </div>
  </div>
  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/pagedone@1.2.2/src/js/pagedone.js"></script>
</body>


<?php echo $__env->yieldContent('scripts'); ?>
</html>
<?php /**PATH C:\Users\Andrea\Desktop\varela\cuatrifinalizado\cuatrifinalizado\VarelaAdmin\resources\views//base/layout.blade.php ENDPATH**/ ?>