@extends('/base/layout')

@section('contenido')
    <div class="container mx-auto py-20">
        <form action="/clientes/guardar" method="POST" enctype="multipart/form-data" class="">
            @csrf
            {{-- img_perfil --}}
            <div class="flex gap-x-6 mb-6">
                <div class="w-30">
                    <label class="flex items-center mb-2 text-gray-600 text-sm font-medium" for="img_perfil">Foto de perfil
                        <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z"
                                fill="#EF4444" />
                        </svg>
                    </label>
                    <input type="file" id="img_perfil" name="img_perfil" value="{{old('img_perfil')}}" class="block h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent rounded-full placeholder-gray-400 focus:outline-none">
                    <span class="text-green-500 text-sm hidden" id="ValidoFoto">¡Correcto!</span>
                    @error('img_perfil')
                    <span class="text-red-500 text-sm" id="InvalidoFoto">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex gap-x-6 mb-6">
                {{-- nombre --}}
                <div class="w-full relative">
                    <label class="flex items-center mb-2 text-gray-600 text-sm font-medium" for="nombre">Nombre
                        <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z"
                                fill="#EF4444" />
                        </svg>
                    </label>
                    <input type="text" id="nombre" name="nombre" value="{{old('nombre')}}" class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none"
                        placeholder="">
                    <span class="text-green-500 text-sm hidden" id="nombreValido">¡Correcto!</span>
                    {{-- <span class="text-red-500 text-sm hidden" >¡Ingresa un nombre!</span> --}}
                    @error('nombre')
                    <span class="text-red-500 text-sm" id="nombreInvalido">*{{ $message }}</span>
                    @enderror
                </div>

                {{-- Apellido Paterno --}}
                <div class="w-full relative">
                    <label class="flex items-center mb-2 text-gray-600 text-sm font-medium" for="apellido_paterno">Apellido Paterno
                        <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z"
                                fill="#EF4444" />
                        </svg>
                    </label>
                    <input type="text" id="apellidoPaterno" name="apellido_paterno" value="{{old('apellido_paterno')}}" class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none"
                        placeholder="">
                    <span class="text-green-500 text-sm hidden" id="apellido_paterno">¡Correcto!</span>
                    @error('apellido_paterno')
                    <span class="text-red-500 text-sm" id="apellido_paterno">*{{ $message }}</span>
                    @enderror
                </div>

                {{-- Apellido materno --}}
                <div class="w-full relative">
                    <label class="flex items-center mb-2 text-gray-600 text-sm font-medium" for="apellido_materno">Apellido Materno
                        <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z"
                                fill="#EF4444" />
                        </svg>
                    </label>
                    <input type="text" id="apellido_materno" name="apellido_materno" value="{{old('apellido_materno')}}" class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none"
                        placeholder="">
                    <span class="text-green-500 text-sm hidden" id="apellido_maternoValido">¡Correcto!</span>
                    @error('apellido_materno')
                    <span class="text-red-500 text-sm" id="apellido_maternoInvalido">*{{ $message }}</span>
                    @enderror
                </div>


                <div class="w-full relative">
                    <label class="flex items-center mb-2 text-gray-600 text-sm font-medium" for="nombre_usuario">Nombre de Usuario
                        <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z"
                                fill="#EF4444" />
                        </svg>
                    </label>
                    <input type="text" id="nombre_usuario" name="nombre_usuario" value="{{old('nombre_usuario')}}" class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none"
                        placeholder="">
                    <span class="text-green-500 text-sm hidden" id="nombre_usuarioValido">¡Correcto!</span>
                    {{-- <span class="text-red-500 text-sm hidden" >¡Ingresa un nombre!</span> --}}
                    @error('nombre_usuario')
                    <span class="text-red-500 text-sm" id="nombre_usuarioInvalido">*{{ $message }}</span>
                    @enderror
                </div>



            </div>

            <div class="flex gap-x-6 mb-6">
                {{-- telefono --}}
                <div class="w-full relative">
                    <label class="flex items-center mb-2 text-gray-600 text-sm font-medium" for="telefono">Telefono
                        <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z"
                                fill="#EF4444" />
                        </svg>
                    </label>
                    <input type="number" id="telefono" name="telefono" value="{{old('telefono')}}" class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none"
                        placeholder="">
                    <span class="text-green-500 text-sm hidden" id="telefonoValido">¡Correcto!</span>
                    @error('telefono')
                    <span class="text-red-500 text-sm" id="telefonoInvalido">*{{ $message }}</span>
                    @enderror
                </div>

                {{-- correo --}}
                <div class="w-full relative">
                    <label class="flex items-center mb-2 text-gray-600 text-sm font-medium" for="correo">Correo electronico
                        <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z"
                                fill="#EF4444" />
                        </svg>
                    </label>
                    <input type="text" id="correo" name="correo" value="{{old('correo')}}" placeholder="ejemplo@gmail.com" class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none"
                        placeholder="">
                    <span class="text-green-500 text-sm hidden" id="correoValido">¡Correcto!</span>
                    @error('correo')
                    <span class="text-red-500 text-sm" id="correoInvalido">*{{ $message }}</span>
                    @enderror
                </div>
            </div>

            {{-- direccion (domicilio)--}}
            <div class="flex gap-x-6 mb-6 mt-6">
                <div class="w-full relative">
                    <label class="flex items-center mb-2 text-gray-600 text-sm font-medium" for="domicilio">Direccion
                        <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z"
                                fill="#EF4444" />
                        </svg>
                    </label>
                    <input type="text" id="domicilio" name="domicilio" value="{{old('domicilio')}}" placeholder="Calle, Num INT, Num EXT, Colonia, Municipio, Estado" class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none"
                        placeholder="">
                    <span class="text-green-500 text-sm hidden" id="domicilioValido">¡Correcto!</span>
                    @error('domicilio')
                    <span class="text-red-500 text-sm" id="domicilioInvalido">*{{ $message }}</span>
                    @enderror
                </div>
            </div>

             {{-- direccion (codigo postal)--}}
             <div class="flex gap-x-6 mb-6 mt-6">
                <div class="w-full relative">
                    <label class="flex items-center mb-2 text-gray-600 text-sm font-medium" for="codigopostal">Codigo Postal
                        <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z"
                                fill="#EF4444" />
                        </svg>
                    </label>
                    <input type="number" id="codigopostal" name="codigopostal" value="{{old('codigopostal')}}" placeholder="Codigo Postal" class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none"
                        placeholder="">
                    <span class="text-green-500 text-sm hidden" id="codigopostalValido">¡Correcto!</span>
                    @error('codigopostal')
                    <span class="text-red-500 text-sm" id="codigopostalInvalido">*{{ $message }}</span>
                    @enderror
                </div>
            </div>

            {{--contraseña --}}
            <div class="flex gap-x-4 mb-6 mt-6 w-1/3">
                <div class="w-full relative">
                    <label class="flex items-center mb-2 text-gray-600 text-sm font-medium" for="contrasena">Contraseña
                        <svg width="7" height="7" class="ml-1" viewBox="0 0 7 7" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M3.11222 6.04545L3.20668 3.94744L1.43679 5.08594L0.894886 4.14134L2.77415 3.18182L0.894886 2.2223L1.43679 1.2777L3.20668 2.41619L3.11222 0.318182H4.19105L4.09659 2.41619L5.86648 1.2777L6.40838 2.2223L4.52912 3.18182L6.40838 4.14134L5.86648 5.08594L4.09659 3.94744L4.19105 6.04545H3.11222Z"
                                fill="#EF4444" />
                        </svg>
                    </label>
                    <input type="password" id="contrasena" name="contrasena" value="{{old('contrasena')}}" class="block w-full h-11 px-5 py-2.5 bg-white leading-7 text-base font-normal shadow-xs text-gray-900 bg-transparent border border-gray-300 rounded-full placeholder-gray-400 focus:outline-none"
                        placeholder="">
                    <span class="text-green-500 text-sm hidden" id="contrasenaValido">¡Correcto!</span>
                    @error('contrasena')
                    <span class="text-red-500 text-sm" id="contrasenaInvalido">*{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="flex gap-x-6 mb-6 mt-6">
                <a href="/cliente/listar" class='py-4 px-6 w-52 h-12 text-sm bg-red-100 text-red-500 rounded-full cursor-pointer font-semibold text-center shadow-xs transition-all duration-500 hover:bg-red-100 hover:text-red-700'>Salir</a>

                <input type="submit" value="Crear Cliente" class='mb-5 w-52 h-12 shadow-sm rounded-full bg-green-600 hover:bg-indigo-800 transition-all duration-700 text-white text-base font-semibold leading-7'>
            </div>
        </form>
    </div>
    {{-- <script src="/js/validacioCliente.js"></script> --}}
@endsection
