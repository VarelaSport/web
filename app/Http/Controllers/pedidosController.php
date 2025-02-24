<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use LDAP\Result;


class pedidosController extends Controller
{

    public function listar()
{
    
    // Verificar que el cliente esté autenticado
    

    // Obtener las órdenes asociadas al cliente autenticado
    $ordenes = DB::table('ordenes as o')
    ->join('clientes as c', 'c.id', '=', 'o.cliente_id')
    ->join('administradores as a', 'a.id', '=', 'o.admin_id')
    ->join('metodos_pago as m', 'm.id', '=', 'o.metodo_pago_id')
    ->select(
        'o.*',
        'o.estatus as estatus',
        'o.id as orden_id',
        'o.total as totalOrden',
        'o.fecha_compra',
        'o.metodo_pago_id as nombre_metodoPago',
        'c.nombre as nombre_cliente',
        'a.id as nombre_administrador'
    )
    ->orderByRaw("
        CASE
            WHEN o.estatus = 'activo' THEN 1
            WHEN o.estatus = 'Pagado' THEN 2
            WHEN o.estatus = 'cancelado' THEN 3
            ELSE 4
        END
    ")
    ->get();

        return view('/pedidos/listar')->with('ordenes',$ordenes);
    }






    public function eliminar(Request $request, $id_producto){
        // \Illuminate\Support\Facades\Gate::authorize('eliminar');
        DB::table('pedidos')
        ->where('id', '=', $id_producto)
        ->update([
            'estatus' => 'Pagado',
        ]);
            return redirect('/pedidos/listar');
    }



    public function mostrar_detalles_orden($order_id)
    {
        // Obtener los datos de la orden específica
        $orden = DB::table('ordenes')
            ->join('clientes', 'clientes.id', '=', 'ordenes.cliente_id')
            ->join('administradores', 'administradores.id', '=', 'ordenes.admin_id')
            ->select(
                'ordenes.*',
                'ordenes.id as orden_id',
                'clientes.nombre as nombre_cliente',
                'administradores.nombre as nombre_administrador',
                'ordenes.estatus',
                'ordenes.total',
                'ordenes.fecha_compra'
            )
            ->where('ordenes.id', '=', $order_id)
            ->first(); // Usamos `first()` porque queremos un solo registro, no una colección

        // Verificar si la orden existe
        if (!$orden) {
            return redirect()->back()->with('error', 'La orden no fue encontrada.');
        }

        // Obtener los productos asociados al pedido
        $productos_pedidos = DB::table('detalles_ordenes')
            ->join('productos', 'productos.id', '=', 'detalles_ordenes.producto_id')
            ->select(
                'detalles_ordenes.*',
                'productos.nombre as nombre',
                'productos.descripcion as descripcion',
                'productos.categoria_principal_id as categoria',
                'productos.precio',
                'productos.fecha_creacion',
                'productos.imagen_producto_uno as image1',
                'productos.imagen_producto_dos as image2',
                'productos.imagen_producto_tres as image3'
            )
            ->where('detalles_ordenes.orden_id', '=', $order_id)
            ->get();

        // Pasar tanto la orden como los productos a la vista
        return view('pedidos.mostrar', compact('orden', 'productos_pedidos'));
    }

    public function registrarPagoReferencia(Request $request, $ordenId)
{

    // dd([
    //     'numero_operacion' => $request->numero_operacion,
    //     'fecha_trasferencia' => $request->fecha_trasferencia,
    //     'hora_trasferencia' => $request->hora_trasferencia,
    //     'concepto' => $request->concepto,
    // ]);
    
    // Validar los datos
    $validated = $request->validate([
        'numero_operacion' => 'required|string|max:255',
        'fecha_trasferencia' => 'required|date',
        'hora_trasferencia' => 'required|date_format:H:i',
        'concepto' => 'required|string|max:255',
    ]);

    try {
        // Insertar el pago referencia
        $pagoReferenciaId = DB::table('pagos_referencias')->insertGetId([
            'numero_operacion' => $validated['numero_operacion'],
            'fecha_trasferencia' => $validated['fecha_trasferencia'],
            'hora_trasferencia' => $validated['hora_trasferencia'],
            'concepto' => $validated['concepto'],
            'fecha_creado' => now(),
            'fecha_actualizado' => now(),
        ]);

        // Actualizar la orden
        DB::table('ordenes')
            ->where('id', $ordenId)
            ->update([
                'pagos_referencias_id' => $pagoReferenciaId,
                'estatus' => 'Pagado',
            ]);

        // Redirigir con éxito
        return redirect('/pedidos/listar')->with('success', 'Pago registrado exitosamente.');
    } catch (\Exception $e) {
        // Redirigir con errores
        return back()->withErrors('Error al registrar el pago: ' . $e->getMessage());
    }
}




    
   
}