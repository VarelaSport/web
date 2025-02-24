<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\Cliente;
use App\Models\Orden;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class PedidosController extends Controller
{

public function misPedidos()
{
    // Obtener el cliente autenticado
    $cliente = Auth::guard('client')->user();

    // Verificar que el cliente esté autenticado
    if (!$cliente) {
        return redirect()->route('login')->with('error', 'Debe iniciar sesión.');
    }

    // Obtener las órdenes asociadas al cliente autenticado
    $ordenes = DB::table('ordenes')
        ->join('clientes', 'clientes.id', '=', 'ordenes.cliente_id')
        ->select('ordenes.*', 'clientes.nombre as cliente', 'ordenes.estatus as estatus')
        ->where([
            ['ordenes.cliente_id', '=', $cliente->id],
            ['ordenes.estatus', '=', 'activo']
        ])
        ->get();

    // Verificar si se obtuvieron órdenes
    if ($ordenes->isEmpty()) {
        return view('productos.misproductos.mis_pedidos', [
            'ordenes' => $ordenes,
            'mensaje' => 'No tienes pedidos registrados.'
        ]);
    }

    // Pasar los datos a la vista
    return view('productos.misproductos.mis_pedidos', compact('ordenes'));
}

  
    public function productos_pedido($order_id)
{
    $cliente = Auth::guard('client')->user();

    // Verificar que el cliente esté autenticado
    if (!$cliente) {
        return redirect()->route('login')->with('error', 'Por favor, inicie sesión para continuar.');
    }

    // Obtener el pedido correspondiente al cliente
    $ordenes = DB::table('ordenes')
        ->where('id', $order_id)
        ->where('cliente_id', $cliente->id)
        ->first();

    // Verificar si el pedido existe
    if (!$ordenes) {
        return redirect()->route('pedidos.misPedidos')->with('error', 'Pedido no encontrado o no autorizado.');
    }

    // Obtener los productos asociados al pedido
    $productos_pedidos = DB::table('detalles_ordenes')
        ->join('productos', 'productos.id', '=', 'detalles_ordenes.producto_id')
        ->select(
            'detalles_ordenes.*',
            'productos.nombre as nombre',
            'productos.descripcion as descripcion',
            'productos.categoria_principal_id as cetegoria',
            'productos.precio',
            'productos.fecha_creacion',
            'productos.imagen_producto_uno as image1',
            'productos.imagen_producto_dos as image2',
            'productos.imagen_producto_tres as image3'
        )
        ->where('detalles_ordenes.orden_id', '=', $order_id)
        ->get();

    // Pasar tanto el pedido como los productos a la vista
    return view('productos.misproductos.mis_pedidos_detalle', compact('ordenes', 'productos_pedidos'));
}

//usar ruta en cancelar pedido

    public function cancelar($order_id)
    {
        try {
            // Actualizar el estatus del pedido en la base de datos
            DB::table('ordenes')
                ->where('id', $order_id)
                ->update([
                    'estatus' => 'cancelado'
                ]); // Cambiar a "cancelado"
    
            // Redirigir con un mensaje de éxito
            return redirect()->route('/mis_pedidos')->with('success', 'Pedido cancelado correctamente.');
            
        } catch (\Exception $e) {
            // Manejo de errores
            return redirect()->back()->with('error', 'Error al cancelar el pedido: ' . $e->getMessage());
        }
    }

}


    
