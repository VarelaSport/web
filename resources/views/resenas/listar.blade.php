{{-- ruta de la plantilla --}}
@extends('/base/layout')

@section('contenido')
    <div class="container mx-auto py-20">               
        <div class="flex flex-col py-5">
            <div class=" overflow-x-auto pb-4">
                <div class="block">
                    <div class="overflow-x-auto w-full  border rounded-lg border-gray-300">
                        @if     (Session::has('mensaje'))
                                {{Session::get('mensaje')}}
                            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                                <span class="font-medium">Reseña Aprobada</span>
                            </div>
                        @endif 
               
                        @if (empty($resenas))
                            No hay reseñas para mostrar
                        @else 
                            <table class="w-full rounded-xl">
                                <thead>
                                    <tr class="bg-gray-50">            
                                        <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize">ID</th>
                                        <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"> Nombre Cliente</th>
                                        <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"> Comentario</th>
                                        <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"> Fecha Creado </th>
                                        <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"> status </th>
                                        <th scope="col" class="p-5 text-left whitespace-nowrap text-sm leading-6 font-semibold text-gray-900 capitalize"> Acción </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-300 ">
                             @foreach ($resenas as $resena) 
                            <tr class="bg-white transition-all duration-500 hover:bg-gray-50">
                                <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 ">{{$resena->id}}</td>
                                <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> {{$resena->nombre_cliente}} {{$resena->apellido_paterno_cliente}}</td>
                                <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> {{$resena->comentario}} </td>
                                <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> {{$resena->fecha_creacion}} </td>
                                <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> {{$resena->status}} </td>
                                
                               
                                {{-- ACCIONES --}}
                                <td class="flex flex-col p-5 items-center gap-2">
                                    <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="openModal()">Abrir Modal</button>
                                    @include('resenas.components.modal-accion')
                                    {{-- <a href="/producto/mostrar">
                                        <svg width="25" height="25" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.45448 13.8008C1.84656 12.6796 1.84656 11.3204 2.45447 10.1992C4.29523 6.80404 7.87965 4.5 11.9999 4.5C16.1202 4.5 19.7046 6.80404 21.5454 10.1992C22.1533 11.3204 22.1533 12.6796 21.5454 13.8008C19.7046 17.196 16.1202 19.5 11.9999 19.5C7.87965 19.5 4.29523 17.196 2.45448 13.8008Z" stroke="black" stroke-width="1.2" class="my-path"></path>
                                            <path d="M15.0126 11.9551C15.0126 13.6119 13.6695 14.9551 12.0126 14.9551C10.3558 14.9551 9.01263 13.6119 9.01263 11.9551C9.01263 10.2982 10.3558 8.95508 12.0126 8.95508C13.6695 8.95508 15.0126 10.2982 15.0126 11.9551Z" stroke="black" stroke-width="1.2" class="my-path"></path>
                                        </svg>
                                    </a> --}}
                                </td>
                            </tr>
                             @endforeach                                 
                        </tbody>
                            </table>
                         @endif
                    </div>
                </div>
            </div>
        </div>
    </div>    
@endsection


<script>
    function openModal() {
        document.getElementById('modal').classList.remove('hidden');
    }
    
    function closeModal() {
        document.getElementById('modal').classList.add('hidden');
    }
    
    function submitSelection() {
        let select = document.querySelector("select").value;
        if (select) {
            alert("Reseña " + select);
            closeModal();
        } else {
            alert("Por favor seleccione una opción.");
        }
    }
</script>