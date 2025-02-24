<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller

{
    // Función para mostrar los administradores en nuestra tabla
    public function listar()
    {
        \Illuminate\Support\Facades\Gate::authorize('SuperAdmin');
        
        $administradores = DB::table('administradores')
            ->where('estado', '=', 'ACTIVO')
            ->get(); // Select * from administradores where estado = 'ACTIVO'
        return view('/administrar/listar')->with('admins', $administradores);
    }

    // Función que redirecciona a nuestro formulario
    public function formulario()
    {   \Illuminate\Support\Facades\Gate::authorize('SuperAdmin');
        return view('/administrar/crear_html5');
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


    

    

        $valorRol = $request->input('rol');
        // Obtener la letra correspondiente al valor numérico
        $valores =[
            '1' => 'Base',
            '2' => 'SuperAdmin',
            '3' => 'MedioAdmin', 
        ];
        
        $valorRol = $valores[$valorRol] ?? null;
        // si no es asignado algun numero dar predeterminado el rango base
        if(!$valorRol == 'SuperAdmin'){
            $valorRol = 'Base';
            return $valorRol;
        } elseif (!$valorRol == 'MedioAdmin'){
            $valorRol = 'Base';
            return $valorRol;
        }

        

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
            'rol' => $valorRol,
            'estado' => 'activo',
        ]);

        return redirect('/administrador/listado')->with('mensaje', 'Administrador insertado correctamente');
    }

    public function editar($id)
    {
        \Illuminate\Support\Facades\Gate::authorize('SuperAdmin');
        $admin = DB::table('administradores')
            ->where('id', '=', $id)
            ->where('estado', '=', 'ACTIVO')
            ->first();
        return view('/administrar/editar')->with('admin', $admin);
    }

    public function actualizar(Request $request, $id)
    {
        \Illuminate\Support\Facades\Gate::authorize('SuperAdmin');
        
         $request->validate([
             'nombre' => 'required|min:3|max:20|alpha|regex:/^[A-Za-z]+$/',
             'usuario' => 'required|min:3|max:15|alpha|regex:/^[A-Za-z]+$/',
             'rol' => 'required',
         ]);

         $valorRol = $request->input('rol');
        // Obtener la letra correspondiente al valor numérico
        $valores =[
            '1' => 'Base',
            '2' => 'SuperAdmin',
            '3' => 'MedioAdmin', 
        ];
        
        $valorRol = $valores[$valorRol] ?? null;
        // si no es asignado algun numero dar predeterminado el rango base
        if(!$valorRol == 'SuperAdmin'){
            $valorRol = 'Base';
            return $valorRol;
        } elseif (!$valorRol == 'MedioAdmin'){
            $valorRol = 'Base';
            return $valorRol;
        }
        

        $admin = DB::table('administradores')->where('id', $id)->first();

        DB::table('administradores')
            ->where('id', '=', $id)
            ->update([
                'nombre' => $request->nombre,
                'usuario' => $request->usuario,
                'rol' => $valorRol,
                'estado' => 'ACTIVO',
            ]);

            return redirect('/administrador/listado')->with('mensaje', 'Administrador actualizado correctamente');
    }

    
        public function mostrar($id)
    { \Illuminate\Support\Facades\Gate::authorize('SuperAdmin');
        $administrador = DB::table('administradores')
            ->where('id', '=', $id)
            ->where('estado', '=', 'ACTIVO')
            ->first();
        return view('/Administrar/mostrar')->with(key:'administrador',value: $administrador);
    }

    public function borrar($id)
    {   \Illuminate\Support\Facades\Gate::authorize('SuperAdmin');
        DB::table('administradores')
            ->where('id', '=', $id)
            ->update(['estado' => 'INACTIVO']);

        return redirect('/administrador/listado');
    }

    // private function subirFoto($imagen)
    // {
    //     $nuevoNombre = 'admin_' . uniqid() . "." . $imagen->getClientOriginalExtension();
    //     $ruta = $imagen->storeAs('admin', $nuevoNombre, 'public');
    //     return 'storage/admin/' . $nuevoNombre;
    // }
}
