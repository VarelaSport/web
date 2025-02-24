@extends('/base/layout')

@section('contenido')
    <div class="container mx-auto py-20 flex justify-center">
        <div class="w-full max-w-3xl bg-white rounded-lg shadow-lg p-8">
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Foto de perfil --}}
                <div class="flex gap-x-6 mb-6 justify-center">
                    <div class="w-32 h-32">
                        <label class="flex items-center mb-2 text-gray-600 text-sm font-medium" for="img_perfil">
                            Foto de perfil
                            <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z"
                                    fill="#EF4444" />
                            </svg>
                        </label>
                        <img src="{{asset($admin->img_perfil)}}" alt="imagen de perfil" class="rounded-full w-full h-full object-cover">
                    </div>
                </div>

                {{-- Nombre --}}
                <div class="flex gap-x-6 mb-6">
                    <div class="w-full relative">
                        <label class="flex items-center mb-2 text-gray-600 text-sm font-medium" for="nombre">Nombre</label>
                        <input readonly type="text" id="nombre" name="nombre" value='{{$admin->nombre}}' class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="">
                        @error('nombre')
                            <span class="text-red-500 text-sm" id="nombreInvalido">*{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Apellidos --}}
                <div class="flex gap-x-6 mb-6">
                    <div class="w-full relative">
                        <label class="flex items-center mb-2 text-gray-600 text-sm font-medium" for="apellido_paterno">Apellido Paterno</label>
                        <input readonly type="text" id="apellido_paterno" name="apellido_paterno" value="{{$admin->apellido_paterno}}" class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @error('apellido_paterno')
                            <span class="text-red-500 text-sm" id="apellido_paternoInvalido">*{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-full relative">
                        <label class="flex items-center mb-2 text-gray-600 text-sm font-medium" for="apellido_materno">Apellido Materno</label>
                        <input readonly type="text" id="apellido_materno" name="apellido_materno" value="{{$admin->apellido_materno}}" class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @error('apellido_materno')
                            <span class="text-red-500 text-sm" id="apellido_maternoInvalido">*{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Usuario y Telefono --}}
                <div class="flex gap-x-6 mb-6">
                    <div class="w-full relative">
                        <label class="flex items-center mb-2 text-gray-600 text-sm font-medium" for="nombre_usuario">Nombre de Usuario</label>
                        <input readonly type="text" id="nombre_usuario" name="nombre_usuario" value="{{$admin->nombre_usuario}}" class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @error('nombre_usuario')
                            <span class="text-red-500 text-sm" id="nombre_usuarioInvalido">*{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="w-full relative">
                        <label class="flex items-center mb-2 text-gray-600 text-sm font-medium" for="nombre_usuario">Rol de Usuario</label>
                        {{-- <select name="rango_id" id="rango_id" class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="3">Selecciona</option>
                            <option value="1">Super Admin</option>
                            <option value="2">Medio Admin</option>
                            <option value="3">Base</option>
                        </select> --}}

                        @if ($admin->rango_id == 1)
                            <p class="text-green-900">Rango Actual: Super Admin</p>
                        @elseif ($admin->rango_id == 2)
                            <p class="text-green-900">Rango Actual: Medio Admin</p>
                        @else
                            <p class="text-green-900">Rango Actual: Base</p>
                        @endif
                        
                        @error('rango_id')
                            <span class="text-red-500 text-sm" id="nombre_usuarioInvalido">*{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                {{-- Dirección --}}
                <div class="flex gap-x-6 mb-6 mt-6">
                    <div class="w-full relative">
                        <label class="flex items-center mb-2 text-gray-600 text-sm font-medium" for="domicilio">Domicilio</label>
                        <input readonly type="text" id="domicilio" name="domicilio" value="{{$admin->domicilio}}" class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @error('domicilio')
                            <span class="text-red-500 text-sm" id="domicilioInvalido">*{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Correo --}}
                <div class="flex gap-x-6 mb-6 mt-6">
                    <div class="w-full relative">
                        <label class="flex items-center mb-2 text-gray-600 text-sm font-medium" for="correo">Correo electronico</label>
                        <input readonly type="text" id="correo" name="correo" value="{{$admin->correo}}" class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-lg placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @error('correo')
                            <span class="text-red-500 text-sm" id="correoInvalido">*{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                {{-- Botones --}}
                <div class="mt-5 flex justify-between">
                    <a href="/Administrador/listado" class="w-52 h-12 bg-red-600 text-white font-semibold rounded-full shadow-sm hover:bg-red-700 transition duration-300 flex items-center justify-center">Salir</a>
                </div>
            </form>
        </div>
    </div>
@endsection
