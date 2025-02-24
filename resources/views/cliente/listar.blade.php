{{-- ruta de la plantilla --}}
@extends('/base/layout')

{{-- Un section por cada yiel que exista --}}
@section('contenido')

    <div class="container mx-auto py-20">
        <a href="/registrar"
            class='m-5 py-2.5 px-6 text-sm rounded-full bg-gradient-to-r from-blue-500 to-blue-300 text-white cursor-pointer font-semibold text-center shadow-xs transition-all duration-500 hover:bg-gradient-to-l'>
            Nuevo Cliente
        </a>
        {{-- <a href="/recuperar/cuenta"
            class='m-5 py-2.5 px-6 text-sm rounded-full bg-gradient-to-r from-orange-500 to-orange-300 text-white cursor-pointer font-semibold text-center shadow-xs transition-all duration-500 hover:bg-gradient-to-l'>
            Recuperar cuenta
        </a> --}}
        <div class="flex flex-col py-5">
            <div class=" overflow-x-auto pb-4">
                <div class="block">
                    <div class="overflow-x-auto w-full  border rounded-lg border-gray-300">
                        @if     (Session::has('mensaje'))
                                {{Session::get('mensaje')}}
                            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                                <span class="font-medium">YA TE REGISTRASTE!</span>
                            </div>
                        @endif 
               
                        @if (empty($clientes))
                            No hay elementos para mostrar
                        @else 
                            <table class="w-full rounded-xl">
                                <thead>
                                    <tr class="bg-gray-50">
                                        
                                        <th scope="col"
                                            class="p-3 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize min-w-[150px]">
                                            Nombre &amp; Email </th>
                                        <th scope="col"
                                            class="p-3 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize">
                                            Usuario </th>
                                        <th scope="col"
                                            class="p-3 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize">
                                            Domicilio </th>
                                        <th scope="col"
                                            class="p-3 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize">
                                            Telefono </th>
                                        <th scope="col"
                                            class="p-3 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize">
                                            Status </th>
                                        <th scope="col"
                                            class="p-3 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize">
                                            Acción </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-300 ">
                        @foreach ($clientes as $cliente)
                                        <tr class="bg-white transition-all duration-500 hover:bg-gray-50">

                                            <td class=" px-2 py-3">
                                                <div class="w-48 flex items-center gap-3">
                                                    <img src="{{ asset($cliente->img_perfil) }}" alt="{{ $cliente->img_perfil }}" width="50px" height="50px">
                                                    <div class="data">
                                                        <p class="font-normal text-sm text-gray-900">{{ $cliente->nombre }}
                                                            {{ $cliente->apellido_materno }} {{ $cliente->apellido_paterno }}
                                                        </p>
                                                        <p class="font-normal text-xs leading-5 text-gray-400">
                                                            {{ $cliente->correo }} </p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class=" px-2 py-3">
                                                <div class="w-48 flex items-center gap-3">
                                                    <p class="font-normal text-sm text-gray-900">{{ $cliente->nombre_usuario }}</p>
                                                </div>
                                            </td>

                                            
                                            <td class=" px-2 py-3">
                                                <div class="w-48 flex items-center gap-3">
                                                    <p class="font-normal text-sm text-gray-900">{{ $cliente->domicilio }}
                                                    </p>
                                                </div>
                                            </td>

                                            <td class=" px-2 py-3">
                                                <div class="w-48 flex items-center gap-3">
                                                    <p class="font-normal text-sm text-gray-900">{{ $cliente->telefono }}
                                                    </p>
                                                </div>
                                            </td>

                                            <td class="p-2 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                <div
                                                    class="py-1.5 px-2.5 bg-emerald-50 rounded-full flex justify-center w-20 items-center gap-1">
                                                    <svg width="5" height="6" viewBox="0 0 5 6" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="2.5" cy="3" r="2.5" fill="#059669">
                                                        </circle>
                                                    </svg>
                                                    <span class="font-medium text-xs text-emerald-600 ">Activo</span>
                                                </div>
                                            </td>

                                            {{-- ACCIONES --}}
                                <td class="flex flex-col p-5 items-center gap-2">
                                    <a href="/cliente/{{$cliente->id}}/editar">
                                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.6711 4.48785L11.4428 9.78833C11.2429 9.99099 11.143 10.0923 11.0761 10.2152L11.0727 10.2215C11.0067 10.3448 10.9772 10.4832 10.9184 10.7599C10.6297 12.1177 10.4853 12.7966 10.8705 13.1765C10.8766 13.1825 10.8827 13.1885 10.889 13.1943C11.2839 13.5644 11.9721 13.4037 13.3486 13.0822C13.6235 13.0181 13.7609 12.986 13.8822 12.9197L13.8839 12.9187C14.0051 12.8521 14.1048 12.7545 14.3042 12.5592L19.6099 7.36337C20.2676 6.71937 20.5964 6.39736 20.6034 5.99372C20.6103 5.59008 20.2928 5.25743 19.6579 4.59212L19.5804 4.51093C18.9033 3.80151 18.5647 3.4468 18.1347 3.44338C17.7047 3.43997 17.3602 3.78926 16.6711 4.48785Z" stroke="black" stroke-width="1.2" class="my-path"></path>
                                            <path d="M19.0007 8.00004L16 5" stroke="black" stroke-width="1.2" class="my-path"></path>
                                            <path d="M13.5882 3H11C7.22876 3 5.34315 3 4.17157 4.17157C3 5.34315 3 7.22876 3 11V13C3 16.7712 3 18.6569 4.17157 19.8284C5.34315 21 7.22876 21 11 21H13C16.7712 21 18.6569 21 19.8284 19.8284C21 18.6569 21 16.7712 21 13V11.4706" stroke="black" stroke-width="1.2" stroke-linecap="round" class="my-path"></path>
                                        </svg>
                                    </a>
                                    
                                    <a href="/cliente/{{{$cliente->id}}}/mostrar">
                                        <svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.45448 13.8008C1.84656 12.6796 1.84656 11.3204 2.45447 10.1992C4.29523 6.80404 7.87965 4.5 11.9999 4.5C16.1202 4.5 19.7046 6.80404 21.5454 10.1992C22.1533 11.3204 22.1533 12.6796 21.5454 13.8008C19.7046 17.196 16.1202 19.5 11.9999 19.5C7.87965 19.5 4.29523 17.196 2.45448 13.8008Z" stroke="black" stroke-width="1.2" class="my-path"></path>
                                            <path d="M15.0126 11.9551C15.0126 13.6119 13.6695 14.9551 12.0126 14.9551C10.3558 14.9551 9.01263 13.6119 9.01263 11.9551C9.01263 10.2982 10.3558 8.95508 12.0126 8.95508C13.6695 8.95508 15.0126 10.2982 15.0126 11.9551Z" stroke="black" stroke-width="1.2" class="my-path"></path>
                                        </svg>
                                    </a>

                                @can('eliminar')
                                    <div class="flex justify-center items-center w-full relativo">
                                        <button type="button"
                                            class="modal-button py-1 px-1 text-xs text-white  cursor-pointer font-semibold text-center shadow-xs"
                                            data-pd-overlay="#pd-slide-down-modal"
                                            data-modal-target="pd-slide-down-modal"
                                            data-modal-toggle="pd-slide-down-modal"> 
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 7L5.29949 14.7868C5.41251 17.7252 5.46902 19.1944 6.40719 20.0972C7.34537 21 8.81543 21 11.7555 21H12.2433C15.1842 21 16.6547 21 17.5928 20.0972C18.531 19.1944 18.5875 17.7252 18.7006 14.7868L19 7" stroke="black" stroke-width="1.2" stroke-linecap="round" class="my-path"></path>
                                                <path d="M20.4706 4.43329C18.6468 4.27371 17.735 4.19392 16.8229 4.13611C13.6109 3.93249 10.3891 3.93249 7.17707 4.13611C6.26506 4.19392 5.35318 4.27371 3.52942 4.43329" stroke="black" stroke-width="1.2" stroke-linecap="round" class="my-path"></path>
                                                <path d="M13.7647 3.95212C13.7647 3.95212 13.3993 2.98339 11.6471 2.9834C9.8949 2.9834 9.52942 3.95211 9.52942 3.95211" stroke="black" stroke-width="1.2" stroke-linecap="round" class="my-path"></path>
                                            </svg> 
                                        </button>
                                        <div id="pd-slide-down-modal"
                                            class="pd-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
                                            <div
                                                class="transform -translate-y-3 opacity-0  ease-out  sm:max-w-lg sm:w-full m-5 sm:mx-auto modal-open:translate-y-0 modal-open:opacity-100 transition-all modal-open:duration-500">
                                                <div class="flex flex-col bg-white rounded-2xl py-4 px-5">
                                                    <div
                                                        class="flex justify-between items-center pb-4 border-b border-gray-200">
                                                        <h4 class="text-sm text-gray-900 font-medium">Eliminar Cliente:</h4>
                                                        <button class="block cursor-pointer close-modal-button"
                                                            data-pd-overlay="#pd-slide-down-modal"
                                                            data-modal-target="pd-slide-down-modal">
                                                            <svg width="24" height="24"
                                                                viewBox="0 0 24 24" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M7.75732 7.75739L16.2426 16.2427M16.2426 7.75739L7.75732 16.2427"
                                                                    stroke="black" stroke-width="1.6"
                                                                    stroke-linecap="round">
                                                                </path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <div class="overflow-y-auto py-4 min-h-[100px]">

                                                        <p class=" text-gray-600 text-sm">
                                                            ¿Estas seguro de que quieres eliminar a este Cliente?
                                                        </p>
                                                        <br>

                                                        <form action="/cliente/{{ $cliente->id }}/eliminar" method="post">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="button"
                                                                class="py-2.5 px-5 text-xs bg-indigo-50 text-indigo-500 rounded-full cursor-pointer font-semibold text-center shadow-xs transition-all duration-500 hover:bg-indigo-100 close-modal-button"
                                                                data-pd-overlay="#pd-slide-down-modal"
                                                                data-modal-target="pd-slide-down-modal">
                                                                Cancel
                                                            </button>
                                                            <input class="py-3 px-5 text-xs bg-red-500 text-white rounded-full cursor-pointer font-semibold text-center shadow-xs transition-all duration-500 hover:bg-red-700 close-modal-button"
                                                                data-pd-overlay="#pd-slide-down-modal"
                                                                data-modal-target="pd-slide-down-modal"
                                                                type="submit" value="Eliminar">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                                </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                         @endif
                    </div>

                    {{-- <nav class="flex items-center justify-center py-4 " aria-label="Table navigation">
                        <ul class="flex items-center justify-center text-sm h-auto gap-12">
                            <li>
                                <a href="javascript:;"
                                    class="flex items-center justify-center gap-2 px-3 h-8 ml-0 text-gray-500 bg-white font-medium text-base leading-7  hover:text-gray-700 ">
                                    <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.0002 14.9999L8 9.99967L13.0032 4.99652" stroke="black"
                                            stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg> Atras </a>
                            </li>

                            <li>
                                <ul class="flex items-center justify-center gap-4">
                                    <li>
                                        <a href="javascript:;"
                                            class="font-normal text-base leading-7 text-gray-500 py-2.5 px-4 rounded-full bg-white transition-all duration-500 hover:bg-indigo-600 hover:text-white">1</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"
                                            class="font-normal text-base leading-7 text-gray-500 py-2.5 px-4 rounded-full bg-white transition-all duration-500 hover:bg-indigo-600 hover:text-white">2</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"
                                            class="font-normal text-base leading-7 text-gray-500 py-2.5 px-4 rounded-full bg-white transition-all duration-500 hover:bg-indigo-600 hover:text-white">3</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"
                                            class="font-normal text-base leading-7 text-gray-500 py-2.5 px-4 rounded-full bg-white transition-all duration-500 hover:bg-indigo-600 hover:text-white">4</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"
                                            class="font-normal text-base leading-7 text-gray-500 py-2.5 px-4 rounded-full bg-white transition-all duration-500 hover:bg-indigo-600 hover:text-white">5</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"
                                            class="font-normal text-base leading-7 text-gray-500 py-2.5 px-4 rounded-full ">
                                            <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.52754 10.001H5.47754M10.5412 10.001H10.4912M15.5549 10.001H15.5049"
                                                    stroke="black" stroke-width="2.5" stroke-linecap="round"></path>
                                            </svg>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;"
                                    class="flex items-center justify-center gap-2 px-3 h-8 ml-0 text-gray-500 bg-white font-medium text-base leading-7  hover:text-gray-700 ">
                                    Siguiente <svg width="21" height="20" viewBox="0 0 21 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.00295 4.99646L13.0032 9.99666L8 14.9998" stroke="black"
                                            stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </nav> --}}

                </div>
            </div>
        </div>
    </div>

@endsection
