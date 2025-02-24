{{-- Ruta de la plantilla --}}
@extends('/base/layout')
{{-- Un section por plantilla existente --}}
@section('contenido')
<div class="ccontainer mx-auto py-20">
<form action="/producto/guardar" method="POST" class="" enctype="multipart/form-data" autocomplete="on">
@csrf

      {{-- nombre --}}
      <div class="flex gap-x-4 mb-6 mt-6 w-1/3">
        <div class="w-full relative">
          <label for="nombre" class="flex  items-center mb-2 text-gray-600 text-sm font-medium">Nombre <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z" fill="#EF4444" />
            </svg>
          </label>
          <input type="text" id="nombre" name="nombre" value="{{old('nombre')}}" class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none">
          <span id="nombreValid" class="nombreValid text-green-500 text-sm hidden">Es correcto</span>
          @error('nombre')
            <span id="nombreInvalid" class="nombreInvalid text-red-500 text-sm">*{{ $message }}</span>
          @enderror
        </div>
      </div>

      {{-- descripcion --}}
      <div class="flex gap-x-6 mb-6">
        <div class="w-full relative">
          <label class="flex  items-center mb-2 text-gray-600 text-sm font-medium" for="descripcion">Descripcion <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z" fill="#EF4444" />
            </svg>
          </label>
          <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="block w-full h-20 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-80 placeholder-gray-400 focus:outline-none ">
            {{old('descripcion')}}
          </textarea>
          <span id="descripcionValid" class="text-green-500 text-sm hidden">Es correcto</span>
          @error('descripcion')
            <span id="descripcionInvalid" class="descripcionInvalid text-red-500 text-sm">*{{ $message }}</span>
          @enderror
        </div>
      </div>
      
      {{-- precio --}}
      <div class="flex gap-x-4 mb-6 mt-6 w-1/3">
        <label class="flex  items-center mb-2 text-gray-600 text-sm font-medium" for="precio">Precio <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z" fill="#EF4444" />
          </svg>
        </label>
        <input type="number" id="precio" name="precio" value="{{old('precio')}}" class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none">
        <span id="precioValid" class="text-green-500 text-sm hidden">Es correcto</span>
        @error('precio')
        <span id="precioInvalid" class="precioInvalid text-red-500 text-sm">*{{ $message }}</span>
        @enderror
      </div>

      <div class="flex gap-x-4 mb-6 mt-6 w-1/3">
        <label class="flex  items-center mb-2 text-gray-600 text-sm font-medium" for="existencia">Existencia <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z" fill="#EF4444" />
          </svg>
        </label>
        <input type="number" id="existencia" value="{{old('existencia')}}" name="existencia" class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none">
        <span id="existenciaValid" class="text-green-500 text-sm hidden">Es correcto</span>
        @error('existencia')
        <span id="precioInvalid" class="precioInvalid text-red-500 text-sm">*{{ $message }}</span>
        @enderror
      </div>

      <div class="flex gap-x-6 mb-6">
      <div class="w-full relative">
        <label class="flex  items-center mb-2 text-gray-600 text-sm font-medium" for="categoria_principal_id">Categoria <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z" fill="#EF4444" />
          </svg>
        </label>
        <select name="categoria_principal_id" id="categoria_principal_id" class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none">
          @foreach ($categorias as $categoria) 
          <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
          {{-- <option value="2">Futbol</option>
          <option value="3">Basquetbol</option>
          <option value="4">Beisbol</option> --}}
          @endforeach
        </select>
        <span id="categoriaValid" class="text-green-500 text-sm hidden">Es correcto</span>
        @error('categoria_principal_id')
        <span id="categoria_principal_idInvalid" class="categoria_principal_idInvalid text-red-500 text-sm">*{{ $message }}</span>
        @enderror
      </div>

      <div class="w-full relative">
        <label for="descuento_id" class="flex  items-center mb-2 text-gray-600 text-sm font-medium">Descuento <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z" fill="#EF4444" />
            </svg>
        </label>
        <select id="descuento_id" name="descuento_id" class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none">
          @foreach ($descuentos as $descuento)
          <option value="{{$descuento->id}}">{{$descuento->tipo}} : {{$descuento->valor}}</option>
          {{-- <option value="2">ejemplo 1</option>
          <option value="3">ejemplo 2</option>
          <option value="4">ejemplo 3</option> --}}
          @endforeach
        </select>
        <span id="descuento_idValid" class="text-green-500 text-sm hidden">Es correcto</span>
        @error('descuento_id')
        <span id="descuento_idInvalid" class="descuento_idInvalid text-red-500 text-sm">*{{ $message }}</span>
        @enderror
      </div>
      </div>





      <div class="w-full relative">
        <label class="flex  items-center mb-2 text-gray-600 text-sm font-medium">Imagen 1 <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z" fill="#EF4444" />
          </svg>
        </label>
        <input type="file" id="imagen_producto_uno" name="imagen_producto_uno">
        @error('imagen_producto_uno')
        <span id="imagen_producto_unoInvalid" class="imagen_producto_unoInvalid text-red-500 text-sm">*{{ $message }}</span>
        @enderror
      </div>

      <div class="w-full relative mt-2">
        <label class="flex  items-center mb-2 text-gray-600 text-sm font-medium">Imagen 2 <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z" fill="#EF4444" />
          </svg>
        </label>
        <input type="file" id="imagen_producto_dos" name="imagen_producto_dos">
        @error('imagen_producto_dos')
        <span id="imagen_producto_dosInvalid" class="imagen_producto_dosInvalid text-red-500 text-sm">*{{ $message }}</span>
        @enderror
      </div>

      <div class="w-full relative mt-2">
        <label class="flex  items-center mb-2 text-gray-600 text-sm font-medium">Imagen 3 <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z" fill="#EF4444" />
          </svg>
        </label>
        <input type="file" id="imagen_producto_tres" name="imagen_producto_tres">
        @error('imagen_producto_tres')
        <span id="imagen_producto_tresInvalid" class="imagen_producto_unoInvalid text-red-500 text-sm">*{{ $message }}</span>
        @enderror
      </div>

      <br>

      <div class="flex gap-x-6 mb-6 mt-6">
        <a href="/producto/listar" class='py-4 px-6 w-52 h-12 text-sm bg-red-100 text-red-500 rounded-full cursor-pointer font-semibold text-center shadow-xs transition-all duration-500 hover:bg-red-100 hover:text-red-700'>Salir</a>
        
        <input type="submit" value="Crear Producto" class='mb-5 w-52 h-12 shadow-sm rounded-full bg-green-600 hover:bg-indigo-800 transition-all duration-700 text-white text-base font-semibold leading-7'>                
      </div>

    </form>
</div>

<!-- <script src="/crear.js"></script> -->
@endsection
