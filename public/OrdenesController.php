<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class OrdenesController extends Controller

{
    // // Función para mostrar las ordenes en nuestra tabla
    public function listar(){
    $ordenesDetalles = DB::table('ordenes as o')
        ->join('clientes as c', 'o.cliente_id', '=', 'c.id')
        ->join('administradores as a', 'o.administrador_id', '=', 'a.id')
        ->join('detalle_ordenes as d', 'd.orden_id', '=', 'o.id')
        ->join('productos as p', 'd.producto_id', '=', 'p.id')
        ->select(
            'o.id as orden_id',
            'o.fecha',
            'o.estado',
            'o.iva',
            'o.descuento as orden_descuento',
            'o.total',
            'c.nombre as cliente_nombre',
            'c.correo as cliente_correo',
            'a.nombre as administrador_nombre',
            'p.nombre as producto_nombre',
            'p.imagenProducto1 as imagen_producto',
            'd.cantidad',
            'd.precio as precio_producto',
            'd.descuento as detalle_descuento'
        )
        ->where('o.estado', '=', 'ACTIVO')
        ->get();

    return view('ordenes.listar')->with('ordenesDetalles', $ordenesDetalles);
}

    // Función que redirecciona a nuestro formulario
    public function formulario()
    {
        \Illuminate\Support\Facades\Gate::authorize('SuperAdmin');
        return view('/ordenes/crear_html5');
    }

    // Función para guardar los datos registrados en el formulario de crear administrador
    public function guardar(Request $request)
    {
        \Illuminate\Support\Facades\Gate::authorize('SuperAdmin');
         
        // $request->validate([
        //     'nombre' => 'required|min:3|max:20|alpha|regex:/^[A-Za-z]+$/', 
        //     'apellidos' => 'required|min:3|max:20|alpha|regex:/^[A-Za-z]+$/',         
        //     'contraseña' => 'required|min:8|max:20|string',
        //     // 'correo' => 'alpha',
        //     'imagen_perfil' => 'mimes:png|max:2048',
        //     'usuario' => 'required|min:3|max:15|alpha|regex:/^[A-Za-z]+$/',
        //     // 'telefono' => 'alpha',
        //     'contrasena' => 'alpha',
        // ]);


    

    

        // $valorRol = $request->input('rol');
        // // Obtener la letra correspondiente al valor numérico
        // $valores =[
        //     '1' => 'Base',
        //     '2' => 'SuperAdmin',
        //     '3' => 'MedioAdmin', 
        // ];
        
        // $valorRol = $valores[$valorRol] ?? null;
        // // si no es asignado algun numero dar predeterminado el rango base
        // if(!$valorRol == 'SuperAdmin'){
        //     $valorRol = 'Base';
        //     return $valorRol;
        // } elseif (!$valorRol == 'MedioAdmin'){
        //     $valorRol = 'Base';
        //     return $valorRol;
        // }

        

        // $guardar = null;
        if ($request->hasFile('imagen_perfil')) {
            $imagen = $request->file('imagen_perfil');
            $nuevoNombre = 'administradores' . uniqid() . "." . $imagen->getClientOriginalExtension();
            $ruta = $imagen->storeAs('administradores', $nuevoNombre, 'public');
            $guardar = 'storage/administradores/' . $nuevoNombre;
        }

        

        DB::table('administradores')->insert([
            'imagen_perfil' => $guardar,
            'nombre' => $request->nombre,
            'contraseña' => Hash::make($request->contraseña), // Cifrar contraseña
            'usuario' => $request->usuario,
            // 'rol' => $valorRol,
            'estado' => 'activo',
        ]);

        return redirect('/administrador/listado')->with('mensaje', 'Administrador insertado correctamente');
    }

    public function editar($id){
        \Illuminate\Support\Facades\Gate::authorize('SuperAdmin');
        $ordenesDetalles = DB::table('ordenes as o')
        ->join('clientes as c', 'o.cliente_id', '=', 'c.id')
        ->join('administradores as a', 'o.administrador_id', '=', 'a.id')
        ->join('detalle_ordenes as d', 'd.orden_id', '=', 'o.id')
        ->join('productos as p', 'd.producto_id', '=', 'p.id')
        ->select(
            'o.id as orden_id',
            'o.fecha',
            'o.estado',
            'o.iva',
            'o.descuento as orden_descuento',
            'o.total',
            'c.nombre as cliente_nombre',
            'c.correo as cliente_correo',
            'a.nombre as administrador_nombre',
            'p.nombre as producto_nombre',
            'p.imagenProducto1 as imagen_producto',
            'd.cantidad',
            'd.precio as precio_producto',
            'd.descuento as detalle_descuento',
        )
        ->where('o.estado', '=', 'ACTIVO')
        ->first();

    //     $ordenes = DB::table('ordenes')
    //         ->where('id', '=', $id)
    //         ->where('estado', '=', 'ACTIVO')
    //         ->first();
    //     return view('/ordenes/editar')->with('orden', $ordenes);
    }

    public function actualizar(Request $request, $id)
    {
        \Illuminate\Support\Facades\Gate::authorize('SuperAdmin');
        
         $request->validate([
             'nombre' => 'required|min:3|max:20|alpha|regex:/^[A-Za-z]+$/',
             'usuario' => 'required|min:3|max:15|alpha|regex:/^[A-Za-z]+$/',
             'rol' => 'required',
         ]);

        //  $valorRol = $request->input('rol');
        // // Obtener la letra correspondiente al valor numérico
        // $valores =[
        //     '1' => 'Base',
        //     '2' => 'SuperAdmin',
        //     '3' => 'MedioAdmin', 
        // ];
        
        // $valorRol = $valores[$valorRol] ?? null;
        // // si no es asignado algun numero dar predeterminado el rango base
        // if(!$valorRol == 'SuperAdmin'){
        //     $valorRol = 'Base';
        //     return $valorRol;
        // } elseif (!$valorRol == 'MedioAdmin'){
        //     $valorRol = 'Base';
        //     return $valorRol;
        // }
        

        $admin = DB::table('administradores')->where('id', $id)->first();

        DB::table('administradores')
            ->where('id', '=', $id)
            ->update([
                'nombre' => $request->nombre,
                'usuario' => $request->usuario,
                // 'rol' => $valorRol,
                'estado' => 'ACTIVO',
            ]);

            return redirect('/ordenes/listado')->with('mensaje', 'Ordene actualizado correctamente');
        }

    public function mostrar($id)
    {
        \Illuminate\Support\Facades\Gate::authorize('SuperAdmin');
        $administrador = DB::table('administradores')
            ->where('id', '=', $id)
            ->where('estado', '=', 'ACTIVO')
            ->first();
        return view('/ordenes/mostrar')->with(key:'ordenes',value: $administrador);
    }

    public function borrar($id)
    {
        \Illuminate\Support\Facades\Gate::authorize('SuperAdmin');
        DB::table('administradores')
            ->where('id', '=', $id)
            ->update(['estado' => 'INACTIVO']);

        return redirect('/ordenes/listado');
    }

    // private function subirFoto($imagen)
    // {
    //     $nuevoNombre = 'admin_' . uniqid() . "." . $imagen->getClientOriginalExtension();
    //     $ruta = $imagen->storeAs('admin', $nuevoNombre, 'public');
    //     return 'storage/admin/' . $nuevoNombre;
    // }
}
