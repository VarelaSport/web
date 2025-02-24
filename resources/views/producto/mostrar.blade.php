{{-- Ruta de la plantilla --}}
@extends('/base/layout')
{{-- Un section por plantilla existente --}}

@section('contenido')
<div class="ccontainer mx-auto py-20">
<form action="/producto/{{$productos->producto_id}}/actualizar" method="POST"  class="" autocomplete="on">
@method('PUT') 
@csrf

@if ($productos->existencia === 0)
        <div class="py-1.5 px-2.5 bg-amber-50 rounded-full flex items-center justify-center w-20 gap-1">
            <svg width="5" height="6" viewBox="0 0 5 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="2.5" cy="3" r="2.5" fill="#D97706"></circle>
            </svg>
            <span class="font-medium text-xs text-amber-600 ">Agotado</span>
        </div>
        @else
        <div class="py-1.5 px-2.5 bg-emerald-50 rounded-full flex justify-center w-20 items-center gap-1">
            <svg width="5" height="6" viewBox="0 0 5 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="2.5" cy="3" r="2.5" fill="#059669"></circle>
            </svg>
            <p>Activo</p>
        </div>
        @endif

      <div class="mt-3 flex gap-x-6 mb-6">
        <div class="w-full relative">
          <label for="nombre" class="flex  items-center mb-2 text-gray-600 text-sm font-medium">Nombre <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z" fill="#EF4444" />
            </svg>
          </label>
          <input readonly type="text" id="nombre" name="nombre_producto"
          class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none" placeholder="" value="{{$productos->nombre_producto}}" required>
          <span id="nombreValid" class="nombreValid text-green-500 text-sm hidden">Es correcto</span>
          @error('nombre')
          <span id="nombreInvalid" class="nombreInvalid text-red-500 text-sm hidden">{{ $message }}</span>
          @enderror
        </div>
      </div>

      <div class="w-full relative">
        <label class="flex  items-center mb-2 text-gray-600 text-sm font-medium">Descripción <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z" fill="#EF4444" />
          </svg>
        </label>
        <textarea readonly name="descripcion_producto" id="descripcion_producto" cols="30" rows="10" class="block w-full h-20 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-50 placeholder-gray-400 focus:outline-none">
          {{$productos->descripcion_producto}}
        </textarea>
        <span id="descripcionValid" class="text-green-500 text-sm hidden">Es correcto</span>
        @error('descripcion_producto')
        <span id="descripcionInvalid" class="text-red-500 text-sm hidden">{{ $message }}</span>
        @enderror
      </div>
      
      <div class="flex gap-x-6 mt-5">
      <div class="w-full relative">
        <label class="flex  items-center mb-2 text-gray-600 text-sm font-medium">Precio <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z" fill="#EF4444" />
          </svg>
        </label>
        <input readonly type="number" id="precio" name="precio" 
        class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none "  placeholder="" value="{{$productos->precio}}">
        <span id="precioValid" class="text-green-500 text-sm hidden">Es correcto</span>
        @error('precio')
        <span id="precioInvalid" class="text-red-500 text-sm hidden">{{ $message }}</span>
        @enderror
      </div>

      <div class="w-full relative">
        <label class="flex  items-center mb-2 text-gray-600 text-sm font-medium"> Existencia <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z" fill="#EF4444" />
          </svg>
        </label>
        <input readonly type="number" id="existencia" name="existencia" 
        class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none " value="{{$productos->existencia}}">
        <span id="existenciaValid" class="text-green-500 text-sm hidden">Es correcto</span>
        @error('existencia')
        <span id="existenciaInvalid" class="text-red-500 text-sm hidden">{{ $message }}</span>
        @enderror
      </div>
    </div>

      <div class="flex gap-x-6 mt-5">
        <div class="w-full relative">
          <label class="flex  items-center mb-2 text-gray-600 text-sm font-medium" for="categoria_principal_id">Categoria <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z" fill="#EF4444" />
            </svg>
          </label>
          <p readonly class="mb-3">Categoria: {{$productos->categoria_principal_id}}</p>
          
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
          <p readonly class="mb-3">{{$productos->tipo}}: {{$productos->valor}}</p>
          <p readonly class="mb-3">Descuento: {{$productos->descripcion_descuento}}</p>
          
          <span id="descuento_idValid" class="text-green-500 text-sm hidden">Es correcto</span>
          @error('descuento_id')
          <span id="descuento_idInvalid" class="descuento_idInvalid text-red-500 text-sm">*{{ $message }}</span>
          @enderror
        </div>
        </div>
    </div>

    <div class="w-full flex space-x-4">
      <div class="relative flex-1">
        <label class="flex items-center mb-2 text-gray-600 text-sm font-medium">Imagen uno
          <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg"></svg>
        </label>
        <img src="{{ asset($productos->imagen_producto_uno) }}" alt="" class="w-1/3 h-30 shadow-lg rounded-md">
      </div>
    
      <div class="relative flex-1">
        <label class="flex items-center mb-2 text-gray-600 text-sm font-medium">Imagen dos
          <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg"></svg>
        </label>
        <img src="{{ asset($productos->imagen_producto_dos) }}" alt="" class="w-1/3 h-30 shadow-lg rounded-md">
      </div>
    
      <div class="relative flex-1">
        <label class="flex items-center mb-2 text-gray-600 text-sm font-medium">Imagen tres
          <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none" xmlns="http://www.w3.org/2000/svg"></svg>
        </label>
        <img src="{{ asset($productos->imagen_producto_tres) }}" alt="" class="w-1/3 h-30 shadow-lg rounded-md">
      </div>
    </div>
 
      <br>
      <div class="flex gap-x-6 mb-6 mt-6">
        <a href="/producto/listar" class='py-4 px-6 w-52 h-12 text-sm bg-red-100 text-red-500 rounded-full cursor-pointer font-semibold text-center shadow-xs transition-all duration-500 hover:bg-red-100 hover:text-red-700'>Salir</a>
      </div>

    </form>
</div>

<!-- <script src="/crear.js"></script> -->
@endsection
