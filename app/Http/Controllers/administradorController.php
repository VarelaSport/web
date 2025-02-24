<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PhpOption\None;
use Illuminate\Support\Facades\Hash;

class administradorController extends Controller
{   

    public function listar(){

        //  \Illuminate\Support\Facades\Gate::authorize('see-administradores');
     
        $admins=DB::table('administradores')->where('estatus','=','ACTIVO')->get();

        $admins = DB::table('administradores as admin')
            // ->join('control_pedidos', 'control_pedidos.id', '=', 'administradores.control_pedidos_id')
            ->join('rangos as rango', 'rango.id', '=', 'admin.rango_id')
            ->select('admin.*', 'admin.id',
            'rango.tipo_rango',
            'admin.nombre',
            'admin.apellido_paterno',
            'admin.apellido_materno',
            'admin.correo',
            'admin.Nombre_usuario as usuario',
            'admin.domicilio',
            'admin.estatus',
            'admin.img_perfil',
            )
            ->where('admin.estatus', '=', 'Activo')
            ->get();


        return view(view:'administrador.listar')->with('admins', $admins);
        // return view('administrador.listar')->with('admin',$admins);
    }

   //funcion formulario
    public function formulario(){
        // \Illuminate\Support\Facades\Gate::authorize('see-administradores');
        return view('administrador.crear');
    }

    //funcion agregar 
    public function store(Request $request){
        // \Illuminate\Support\Facades\Gate::authorize('see-administradores');
        $request->validate([
        'nombre' => 'required|regex:/^[\pL\s]+$/u|max:20',
        'apellido_paterno' => 'required|regex:/^[\pL\s]+$/u|max:20',
        'apellido_materno' => 'required|regex:/^[\pL\s]+$/u|max:20',
        'correo' => 'required|email|max:50',
        'contrasena' => 'required|string|min:8|max:20',
        'nombre_usuario' => 'unique:administradores,nombre_usuario|string|max:50',
        'domicilio' => 'required|string|max:50',
        'img_perfil' => 'required|mimes:png,jpg',
        // 'estatus' => 'nullable',
        'rango_id' => 'exists:rangos,id',
        // 'ultima_actualizacion' => 'nullable',
        // 'fecha_creado' => 'nullable',
        ]);

        $valorRol = $request->input('rango_id');

        // if ($valorRol !== 1 && $valorRol !== 2) {
        //         $valorRol = 3;
        // }
        
        
        // Obtener la letra correspondiente al valor numérico
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
       
        if ($request->hasFile('img_perfil')){
        // Obtener el archivo correctamente
        $imagen = $request->file('img_perfil');
        // Generar un nombre único para la imagen
        $nuevo = 'admin_' . uniqid() . '.' . $imagen->extension();
        // Guardar el archivo en 'storage/app/public/admin' y obtener la ruta
        $ruta = $imagen->storeAs('admin', $nuevo, 'public');
        // Convertir la ruta en una URL accesible públicamente
        $urlNueva = 'storage/admin/' . $nuevo;
        }

        // Inserción de datos en la base de datos

        DB::table('administradores')->insert([
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'correo' => $request->correo,
            'contrasena' =>Hash::make( $request->contrasena), // Es recomendable encriptar la contraseña
            'domicilio' => $request->domicilio,
            'nombre_usuario' => $request->nombre_usuario,
            'img_perfil' => $urlNueva, // Guardar la ruta de la imagen
            'rango_id' => $valorRol,
            'estatus' => 'Activo',
            'ultima_actualizacion' => now(),
            'fecha_creado' => now(),
        ]);

       
        return redirect('/Administrador/listado')->with('success', 'Administrador creado correctamente');
    }
    

    //funcion editar
    public function editar($id){
        // \Illuminate\Support\Facades\Gate::authorize('see-administradores');
       $admin= DB::table('administradores')
        ->where('id', '=', $id)
        ->where('estatus','=','ACTIVO')
        ->first();
        return view('/Administrador/editar')->with(key:'admin',value:$admin);
    }

    public function actualizar(Request $request, $id){
        // \Illuminate\Support\Facades\Gate::authorize('see-administradores');
        $request->validate([
            'nombre' => 'required|regex:/^[\pL\s]+$/u|max:20',
            'apellido_paterno' => 'required|regex:/^[\pL\s]+$/u|max:20',
            'apellido_materno' => 'required|regex:/^[\pL\s]+$/u|max:20',
            'correo' => 'required|email|max:50',
            // 'contrasena' => 'required|string|min:8|max:20',
            // 'nombre_usuario' => 'required|string|max:50',
            // 'nombre_usuario' => 'unique:administradores,nombre_usuario|required|string|max:50',
            'domicilio' => 'required|string|max:50',
            // 'img_perfil' => 'required|mimes:png,jpg',
            // 'estatus' => 'nullable',
            'rango_id' => 'exists:rangos,id',
            // 'ultima_actualizacion' => 'nullable',
            // 'fecha_creado' => 'nullable',
            ]);
    
            $valorRol = $request->input('rango_id');
    
            // if ($valorRol !== 1 && $valorRol !== 2) {
            //         $valorRol = 3;
            // }
            
            
            // Obtener la letra correspondiente al valor numérico
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
           
            // if ($request->hasFile('img_perfil')){
            // // Obtener el archivo correctamente
            // $imagen = $request->file('img_perfil');
            // // Generar un nombre único para la imagen
            // $nuevo = 'admin_' . uniqid() . '.' . $imagen->extension();
            // // Guardar el archivo en 'storage/app/public/admin' y obtener la ruta
            // $ruta = $imagen->storeAs('admin', $nuevo, 'public');
            // // Convertir la ruta en una URL accesible públicamente
            // $urlNueva = 'storage/admin/' . $nuevo;
            // }
    
            // Inserción de datos en la base de datos
    
            DB::table('administradores')->update([
                'nombre' => $request->nombre,
                'apellido_paterno' => $request->apellido_paterno,
                'apellido_materno' => $request->apellido_materno,
                'correo' => $request->correo,
                'contrasena' =>Hash::make( $request->contrasena), // Es recomendable encriptar la contraseña
                'domicilio' => $request->domicilio,
                // 'nombre_usuario' => $request->nombre_usuario,
                // 'img_perfil' => $urlNueva, // Guardar la ruta de la imagen
                'rango_id' => $valorRol,
                'estatus' => 'Activo',
                'ultima_actualizacion' => now(),
                // 'fecha_creado' => now(),
            ]);
         
        return redirect(to:'/Administrador/listado');

    }

            //funcion eliminar
    public function mostrar($id){
        // \Illuminate\Support\Facades\Gate::authorize('see-administradores');
        $admin= DB::table('administradores')
         ->where('id', '=', $id)
         ->where('estatus','=','ACTIVO')
         ->first();
        return view('/administrador/mostrar')->with(key:'admin',value:$admin);
    }

    public function borrar($id){
        // \Illuminate\Support\Facades\Gate::authorize('see-administradores');
        DB::table('administradores')
        ->where('id','=',$id)
        ->update ([
            'estatus' => 'Inactivo',
        ]);
         
        return redirect('/Administrador/listado');

    }



    

}




