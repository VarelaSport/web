@extends('/base/layout')

@section('contenido')
<div class="container mx-auto py-12 px-6 lg:px-20">
  <form id="formulario" action="/Administrador/guardar" method="POST" autocomplete="on" enctype="multipart/form-data" class="space-y-6 bg-white p-8 shadow-lg rounded-lg">
    @csrf

    <!-- Campo Avatar -->
    <div>
      <label for="img_perfil" class="block text-sm font-medium text-gray-700 mb-2">Imagen</label>
      <input type="file" id="img_perfil" name="img_perfil" accept="image/*">
      <span id="img_perfilValid" class="text-green-500 text-sm hidden">Tipo de imagen válido</span>
      <span id="fotoInvalid" class="text-red-500 text-sm hidden">Tipo de imagen no válido</span>
      @error('img_perfil')
      <span id="fotoInvalid" class="text-red-500 text-sm">{{ $message }}</span>
      @enderror
    </div>

    <div class="flex gap-x-6 mb-6">
      <!-- Campo Nombre -->
      <div class="w-full relative">
        <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2">Nombre</label>
        <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}"
        class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none"
          placeholder="Ingresa el nombre">
        @error('nombre')
        <span id="nombreInvalid" class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>

      <!-- Campo Apellido -->
      <div class="w-full relative">
        <label for="apellido_paterno" class="block text-sm font-medium text-gray-700 mb-2">Apellido Paterno</label>
        <input type="text" id="apellido_paterno" name="apellido_paterno" value="{{ old('apellido_paterno') }}"
          class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none"
          placeholder="Ingresa el apellido">
        @error('apellido_paterno')
        <span id="apellidoInvalid" class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>
    
      <div class="w-full relative">
        <label for="apellido_materno" class="block text-sm font-medium text-gray-700 mb-2">Apellido Materno</label>
        <input type="text" id="apellido_materno" name="apellido_materno" value="{{ old('apellido_materno') }}"
          class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none"
          placeholder="Ingresa el apellido">
        @error('apellido_materno')
        <span id="apellidoInvalid" class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>
    </div>
    
    <div class="flex gap-x-6 mb-6">
        <!-- Campo Username -->
      <div>
        <label for="nombre_usuario" class="block text-sm font-medium text-gray-700 mb-2">Username</label>
        <input type="text" id="username" name="nombre_usuario" value="{{ old('nombre_usuario') }}"
          class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none"
          placeholder="Ingresa el nombre de usuario">
        @error('nombre_usuario')
        <span id="usernameInvalid" class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
      </div>

      <!-- Campo Correo -->
      <div>
        <label for="correo" class="block text-sm font-medium text-gray-700 mb-2">Correo</label>
        <input type="email" id="correo" name="correo" value="{{ old('correo') }}"
          class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none"
          placeholder="Ingresa el correo">
        @error('correo')
        <span id="correoInvalid" class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
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
      @error('rango_id')
      <span id="rangoInvalid" class="text-red-500 text-sm">{{ $message }}</span>
      @enderror
    </div>

    <!-- Campo Contraseña -->
    <div>
      <label for="contrasena" class="block text-sm font-medium text-gray-700 mb-2">Contraseña</label>
      <input type="password" id="contrasena" name="contrasena"
        class="block w-1/3 h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none"
        placeholder="Ingresa la contraseña">
      @error('contrasena')
      <span id="contrasenaInvalid" class="text-red-500 text-sm">{{ $message }}</span>
      @enderror
    </div>

    <div>
      <label for="domicilio" class="block text-sm font-medium text-gray-700 mb-2">Domicilio</label>
      <textarea name="domicilio" id="domicilio" cols="30" rows="10" class="block w-full h-12 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-50 placeholder-gray-400 focus:outline-none">
      </textarea>
      @error('domicilio')
      <span id="domicilioInvalid" class="text-red-500 text-sm">{{ $message }}</span>
      @enderror
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
@endsection
