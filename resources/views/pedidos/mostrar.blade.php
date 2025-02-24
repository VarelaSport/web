{{-- Ruta de la plantilla --}}
@extends('/base/layout')

{{-- Un section por plantilla existente --}}
@section('contenido')
<br>
<br>
<br>
<div class="container mx-auto py-10">
    {{-- <form action="/producto/{{$orden->orden_id}}/actualizar" method="POST" class="space-y-6" autocomplete="on">
        @method('PUT') 
        @csrf --}}

        <div>
            <h1 class="text-2xl font-bold mb-6">Detalles del Pedido #{{ $orden->id }}</h1>

            @if ($productos_pedidos->isEmpty())
                <p class="text-gray-700">No hay productos en este pedido.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2 text-left"># ID</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Producto</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Descripción</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Imagen</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Cantidad</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Precio</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Total</th>
                                <th class="border border-gray-300 px-4 py-2 text-left">Marcado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productos_pedidos as $detalle)
                                <tr class="odd:bg-white even:bg-gray-50">
                                    <td class="border border-gray-300 px-4 py-2">{{ $detalle->id }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $detalle->nombre }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $detalle->descripcion }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <img src="{{ asset($detalle->image1) }}" alt="{{ $detalle->image1 }}" class="w-24 h-24 object-cover rounded-md">
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $detalle->total_cantidad }}</td>
                                    <td class="border border-gray-300 px-4 py-2">${{ number_format($detalle->precio, 2) }}</td>
                                    <td class="border border-gray-300 px-4 py-2">${{ number_format($detalle->total_cantidad * $detalle->precio, 2) }}</td>
                                    <td class="border border-gray-300 px-4 py-2"><input type="checkbox" name="listo" id="lisato"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
            <div class="flex justify-between items-center mt-6">
              <h3 class="text-lg font-semibold text-gray-800">
                  Total Pedido: ${{ number_format($orden->total, 2) }}
              </h3>
              <a href="/pedidos/listar" class="bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded-md">
                  Volver
              </a>

              <form action="/pedidos/{{$orden->id}}/actualizar" method="POST">
                @csrf
                @method('PUT') 
                <label for="numero_operacion">
                    Numero Operacion
                </label>
                <input type="number" name="numero_operacion" class="border border-gray-300 rounded-md px-3 py-2" >
                
                <label for="fecha_trasferencia">
                    Fecha Transferencia
                </label>
                <input type="date" name="fecha_trasferencia" class="border border-gray-300 rounded-md px-3 py-2" >
                
                <label for="hora_trasferencia">
                    Hora Transferencia
                </label>
                <input type="time" name="hora_trasferencia" class="border border-gray-300 rounded-md px-3 py-2" >

                <label for="concepto">
                    Concepto
                </label>
                <input type="number" name="concepto" class="border border-gray-300 rounded-md px-3 py-2" >
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-md">
                    Registrar Pago
                </button>
            </form>
            
          </div>
        </div>
    {{-- </form> --}}
</div>
@endsection

