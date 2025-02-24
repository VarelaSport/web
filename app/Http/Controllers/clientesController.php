<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use App\Models\Cliente;



class clientesController extends Controller
{

    //visualizar el formulario
    public function formulario(){
        // ver formulario de registro
        return view('/cliente/crear');
    }

    // visualizar clientes Activos
    public function listar(){

        $clientes = DB::table('clientes')->where('estatus','=','Activo')->get();  //select * from clientes where estatus = activo
        //sirve para filtrar por columna y contenido de la misma en este caso usamos el valor de activo y solo mostraremos los que contengan esatus

        // $clientes = Cliente::paginate(10);

        return view('/cliente/listar')->with('clientes',$clientes);

    }


    // guaradr clientes
    public function guardar(Request $request){

         $request -> validate([
             'nombre' => 'required|min:3|max:20|alpha|regex:/^[A-Za-z]+$/',
             'apellido_materno' => 'required|min:3|max:20|alpha|regex:/^[A-Za-z]+$/',
             'apellido_paterno' => 'required|min:3|max:20|alpha|regex:/^[A-Za-z]+$/',
             'codigopostal' => 'required|digits:5',
             'domicilio' => 'required|min:3|max:50|string',
             'correo' => 'required|email',
             'telefono' => 'required|numeric|integer',
             'contrasena' => 'required|min:8|max:20|string',
             'img_perfil' => 'required|mimes:png,jpg|max:2048',
             'nombre_usuario' => 'required|unique:clientes,nombre_usuario|min:3|max:15|alpha|regex:/^[A-Za-z]+$/',
             ]);

            //  convertir campos en mayusculas
            $nombre = strtoupper($request->input('nombre'));
            $apellido_materno = strtoupper($request->input('apellido_materno'));
            $apellido_paterno = strtoupper($request->input('apellido_paterno'));
            $domicilio = strtoupper($request->input('domicilio'));

            // convertir la imagen y guardarla ccreando nueva ruta
            if ($request->hasFile('img_perfil')) {
                // Obtener la imagen subida a 'imgPerfil
                $imagen = $request->file('img_perfil');

                // Generar un nombre único para la imagen (nombre unico)
                $nuevoName = 'cliente_' . uniqid() . '.' . $imagen->extension();

                // Guardar la imagen en la carpeta 'public/storage/cliente'
                $ruta = $imagen->storeAs('cliente', $nuevoName, 'public');

                // Crear la URL pública para la imagen guardada
                $urlImageNueva = 'storage/cliente/' . $nuevoName; // Ruta para guardar en la base de datos
            }


            DB::table('clientes')->insert([
                'nombre' => $nombre,
                'apellido_materno' => $apellido_materno,
                'apellido_paterno' => $apellido_paterno,
                'codigopostal' => $request->codigopostal,
                'domicilio' => $domicilio,
                'correo' => $request->correo,
                'telefono' => $request->telefono,
                'contrasena' => Hash::make($request->contrasena),
                'img_perfil' => $urlImageNueva,
                'estatus' => 'Activo',
                'nombre_usuario' => $request->nombre_usuario,
            ]);

            return redirect('/cliente/listar')->with('Agregado', 'Cliente agregado');
    }

    // editaremos la informacion de los clientes
    public function editar($id){
        $cliente = DB::table('clientes')
        ->where('id', '=', $id)
        ->where('estatus', '=','Activo')
        ->first();
        return view('/cliente/editar')->with('cliente',$cliente);
    }



    // actulizaremos la informacion de los clientes (los que editamos)
    public function actulizar(Request $request, $id){

        $validateData =  $request -> validate([
            'nombre' => 'required|min:3|max:20|alpha|regex:/^[A-Za-z]+$/',
            'apellido_materno' => 'required|min:3|max:20|alpha|regex:/^[A-Za-z]+$/',
            'apellido_paterno' => 'required|min:3|max:20|alpha|regex:/^[A-Za-z]+$/',
            'domicilio' => 'required|min:3|max:50|string',
            'correo' => 'required|email',
            'telefono' => 'required|numeric|integer',
            // 'contrasena' => 'required|min:8|max:20|string',
            // 'img_perfil' => 'required|mimes:png,jpg|max:2048',
            'nombre_usuario' => 'required|unique:clientes,nombre_usuario|min:3|max:15|alpha|regex:/^[A-Za-z]+$/',
            ]);

            //  convertir campos en mayusculas
            $nombre = strtoupper($request->input('nombre'));
            $apellido_materno = strtoupper($request->input('apellido_materno'));
            $apellido_paterno = strtoupper($request->input('apellido_paterno'));
            $domicilio = strtoupper($request->input('domicilio'));

            DB::table('clientes')
            ->where('id','=',$id)
            ->update ([
                'nombre' => $nombre,
                'apellido_materno' => $apellido_materno,
                'apellido_paterno' => $apellido_paterno,
                'domicilio' => $domicilio,
                'correo' => $request->correo,
                'telefono' => $request->telefono,
                'estatus' => 'Activo',
                'nombre_usuario' => $request->nombre_usuario,
            ]);

            return redirect(to:'/cliente/listar');
    }


    // mostraremos la informacion de los clientes
    public function mostrar($id){
        $cliente = DB::table('clientes')
        ->where('id', '=', $id)
        ->where('estatus', '=', 'Activo')
        ->first();
        return view('/cliente/mostrar')->with(key:'cliente',value:$cliente);
    }

    // eliminar clientes (solo cambiaremos su estatus a Inactivo)
    public function eliminar(Request $request, $id){
        \Illuminate\Support\Facades\Gate::authorize('eliminar');
        DB::table('clientes')
        ->where('id', '=', $id)
        ->update([
            'estatus' => 'Inactivo',
        ]);

            return redirect(to:'/cliente/listar');
    }

}

