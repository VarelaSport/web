<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

use Barryvdh\DomPDF\Facade\Pdf;



class PdfController extends Controller
{
    public function resumenVentas(){
        $ordenes = DB::table('detalles_ordenes')
    ->join('productos as p', 'p.id', '=', 'detalles_ordenes.producto_id')
    ->select(
        'detalles_ordenes.orden_id',
        'detalles_ordenes.producto_id',
        'detalles_ordenes.total_cantidad as cantidad_productos',
        'detalles_ordenes.precio_unidad as precio_unidad',
        'p.nombre as nombre_producto',
        'detalles_ordenes.total as tota_precio',
        'p.imagen_producto_uno as imagen_uno'
        )
    ->get();



         // Pasar tanto la orden como los productos a la vista
         return view('PDF.resumenVentas')->with('ordenes',$ordenes);
    }

    public function filtro(Request $request){

        $opcion = $request->input('opcion');

        if($opcion = 'activo' || $opcion = 'cancelado' ){
            $ordenes = DB::table('detalles_ordenes')
            ->join('productos as p', 'p.id', '=', 'detalles_ordenes.producto_id')
            ->join('ordenes', 'ordenes.id', '=', 'orden_id')
            ->select(
                'detalles_ordenes.orden_id',
                'detalles_ordenes.producto_id',
                'detalles_ordenes.total_cantidad as cantidad_productos',
                'detalles_ordenes.precio_unidad as precio_unidad',
                'p.nombre as nombre_producto',
                'detalles_ordenes.total as tota_precio',
                'p.imagen_producto_uno as imagen_uno'
                )
            ->where('ordenes.estatus', '=', $opcion)
            ->get();
        }else{
            $ordenes = DB::table('detalles_ordenes')
            ->join('productos as p', 'p.id', '=', 'detalles_ordenes.producto_id')
            ->select(
                'detalles_ordenes.orden_id',
                'detalles_ordenes.producto_id',
                'detalles_ordenes.total_cantidad as cantidad_productos',
                'detalles_ordenes.precio_unidad as precio_unidad',
                'p.nombre as nombre_producto',
                'detalles_ordenes.total as tota_precio',
                'p.imagen_producto_uno as imagen_uno'
                )
            ->get();
        }
        


         // Pasar tanto la orden como los productos a la vista
         return view('PDF.resumen-filtro.filtro')->with('ordenes',$ordenes);
    }

    public function generadorPDF(){

        // Obtener los datos de las ventas/detalleOrdenes
        $ordenes = DB::table('detalles_ordenes')
        ->join('productos as p', 'p.id', '=', 'detalles_ordenes.producto_id')
        ->select(
            'detalles_ordenes.orden_id',
            'detalles_ordenes.producto_id',
            'detalles_ordenes.total_cantidad as cantidad_productos',
            'detalles_ordenes.precio_unidad as precio_unidad',
            'p.nombre as nombre_producto',
            'detalles_ordenes.total as tota_precio',
            'p.imagen_producto_uno as imagen_uno'
            )
        ->get();
        // Generar el PDF con la vista 'ventas.pdf'
        $pdf = Pdf::loadView('PDF.importPDF', compact('ordenes'))->setPaper('a4', 'portrait');

        // Descargar el PDF o mostrarlo en el navegador
        return $pdf->stream('ResumenDeCompras.PDF'); // Para ver en el navegador
        // return $pdf->download('/PDF/ventaspdf'); // Para descargar
    }

}

