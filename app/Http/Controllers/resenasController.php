<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;



class resenasController extends Controller
{
    
    public function listar_resenas()
    {

        $resenas = DB::table('resenas')
        ->join('clientes as c', 'resenas.cliente_id', '=', 'c.id')
        ->select(
            'resenas.*',
            // 'resenas.calificacion as calificacion',
            'c.nombre as nombre_cliente', 
            'c.apellido_paterno as apellido_paterno_cliente', 
            'c.img_perfil as imagen_cliente'
        )
        ->orderBy('resenas.fecha_creacion', 'desc')
        ->get()
        ->map(function ($resena) {
            $resena->fecha_creacion = Carbon::parse($resena->fecha_creacion)->translatedFormat('j \d\e F \d\e Y');
            return $resena;
        });

        return view('resenas.listar', ['resenas' => $resenas]);
    }

    public function actualizar_resena(Request $request, $id)
{
    // Verificar si la reseña existe
    $resena = DB::table('resenas')
    ->where('id', $id)
    ->first();

    if (!$resena) {
        return redirect()->route('listar_resenas')->with('error', 'Reseña no encontrada');
    }

    // Validar el estado recibido
    $request->validate([
        'status' => 'required',
    ]);

    // Actualizar la reseña en la base de datos
    DB::table('resenas')
    ->where('id', $id)
    ->update([
        'status' => $request->status
    ]);

    return redirect()->route('listar_resenas')->with('success', 'Reseña actualizada correctamente');
}

}

