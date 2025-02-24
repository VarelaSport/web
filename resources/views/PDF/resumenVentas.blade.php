{{-- Ruta de la plantilla --}}
@extends('/base/layout')

{{-- Un section por plantilla existente --}}
@section('contenido')
<div class="espacion p-5"></div>
<div class="container mx-auto py-10">
    
        <div>
            <div class="header-table">
                <div class="titulo">
                    <h1 class="text-2xl font-bold mb-6">Detalles de ventas</h1>
                </div>
                <div class="icono-ventas flex items-center justify-center bg-white p-4 mb-3 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <a href="/descargar/resumenVentas" class="flex flex-col items-center text-gray-700 hover:text-blue-600">
                        <div class="bg-blue-100 p-3 rounded-full">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-8 h-8">
                                <path d="M18.5 9C19.8807 9 21 10.1193 21 11.5V15C21 17.8284 21 19.2426 20.1213 20.1213C19.2426 21 17.8284 21 15 21H9C6.17157 21 4.75736 21 3.87868 20.1213C3 19.2426 3 17.8284 3 15V11.5C3 10.1193 4.11929 9 5.5 9" stroke="currentColor" stroke-width="2" stroke-linecap="round"></path>
                                <path d="M12 16L7.80408 11.804M12 16L16.196 11.804M12 16V3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </div>
                        <p class="mt-2 text-lg font-semibold">Descargar ventas</p>
                    </a>
                </div>
                {{-- <div class="relative flex justify-end bg-blue-600 mb-5">
                    <!-- Botón SVG -->
                        <button id="toggleMenu" class="p-4 bg-blue-600 rounded-full shadow-md hover:bg-blue-700 transition">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.00378 5.99561L15.004 11.9959L9.00024 17.9996" stroke="black" stroke-width="null" stroke-linecap="round" stroke-linejoin="round" class="my-path"></path>
                                </svg>
                        </button>
                    @include('PDF.components.modal-filtro')
                </div> --}}
            </div>
            

            @if ($ordenes->isEmpty())
                <p class="text-gray-700">No hay productos en este pedido.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2 text-left"># ID</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Producto</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Imagen</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Cantidad</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Precio</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ordenes as $detalle)
                                <tr class="odd:bg-white even:bg-gray-50">
                                    <td class="border border-gray-300 px-4 py-2">{{ $detalle->producto_id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $detalle->nombre_producto }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <img src="{{ asset($detalle->imagen_uno) }}" alt="{{ $detalle->imagen_uno }}" class="w-24 h-24 object-cover rounded-md">
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $detalle->cantidad_productos }}</td>
                                    <td class="border border-gray-300 px-4 py-2">${{($detalle->precio_unidad) }}</td>
                                    <td class="border border-gray-300 px-4 py-2">${{$detalle->tota_precio}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
            <div class="flex justify-between items-center mt-6">
              <a href="/pedidos/listar" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-md">
                  Volver
              </a>           
            </div>
        </div>
    {{-- </form> --}}
</div>
@endsection

