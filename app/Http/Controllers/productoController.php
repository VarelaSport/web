<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use LDAP\Result;


class productoController extends Controller
{
   
    public function formulario(){
         //return "Saludos desde la funcion formulario";
        
         // Obtener todos los descuentos
            $descuentos = DB::table('descuentos')->get();

        // Obtener todas las categorías
            $categorias = DB::table('categoria_principal')->get();
        
        return view('/producto/crear', compact('descuentos', 'categorias'));
    }

    // categoria
    public function formularioCategoria(){
        //return "Saludos desde la funcion formulario";
       return view('/producto/config/crearCategoria');
   }

   public function guardarCategoria(Request $request){
        $request->validate([
            'nombre' => 'required|max:50',
        ]);

        DB::table('categoria_principal')->insert([
            'nombre' => $request->nombre,
        ]);

        return redirect('/producto/listar');
   }

//    public function listarDescuentos(){

//    }

//    -----------------------------------------------------------
    //    descuento
    // public function formularioDescuento(){
    //     //return "Saludos desde la funcion formulario";
    //     return view('/producto/config/crearDescuento');
    // }

    // public function guardarDescuento(Request $request){

    //     $request->validate([
    //         'tipo' => 'required',
    //         'valor' => 'required|max:50',
    //         'descripcion' => 'required|string|max:100',           
    //     ]);

    //     $valorTipo = $request->input('tipo');

    //     $valores =[
    //         '1' => 'Porcentaje',
    //         '2' => 'Monto',
    //     ];

    //     $valorTipo = $valores[$valorTipo] ?? Null;

    //     if ($valorTipo !== 'Porcentaje') {
    //         $valorTipo = 'Monto';
    //     }
        
    //     DB::table('descuentos')->insert([
    //         'tipo' => $valorTipo,
    //         'valor' => $request->valor,
    //         'descripcion' => $request->descripcion,
    //     ]);

    //     return redirect('/producto/listar');
    // }
//    -----------------------------------------------------------

    public function listar(){
        $productos = DB::table('productos as p')
        ->join('categoria_principal as cap', 'p.categoria_principal_id', '=', 'cap.id')
        ->join('categoria_secundaria as cas', 'p.categoria_secundaria_id', '=', 'cas.id')
        ->join('descuentos as d', 'p.descuento_id', '=', 'd.id')
        ->select(
            'p.id as producto_id',
            'p.nombre as nombre_producto',
            'p.descripcion as descripcion_producto',
            'p.estatus',
            'p.precio',
            'p.existencia',
            'p.imagen_producto_uno',
            'p.imagen_producto_dos',
            'p.imagen_producto_tres',
            'cap.nombre as categoria_principal_id',
            'cas.nombre as categoria_secundaria_id',
            'd.tipo',
            'd.valor',
            'd.descripcion as descripcion_descuento',
        )
        ->where('estatus','=','Activo')->get();
        return view('/producto/listar', ['productos' => $productos]); 
    }


    public function guardar(Request $request){
        

            $request->validate([
                'nombre' => 'required|string|max:255',
                'descripcion' => 'nullable|string',
                'categoria_principal_id' => 'required',
                // 'categoria_secundaria_id' => 'required|integer',
                'descuento_id' => 'required',      
                'precio' => 'required|numeric',
                'existencia' => 'required|numeric',
                'imagen_producto_uno' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
                'imagen_producto_dos' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
                'imagen_producto_tres' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // dd($request->all());
              

            $rutaImagen1 = null;
            $rutaImagen2 = null;
            $rutaImagen3 = null;

            if ($request->hasFile('imagen_producto_uno')) {
                $imagen1 = $request->file('imagen_producto_uno');
                $nuevoNombre1 = 'producto_' . time() . '_1.' . $imagen1->getClientOriginalExtension();
                $rutaImagen1 = $imagen1->storeAs('imagenes/productos', $nuevoNombre1, 'public');
                $rutaImagen1 = asset(path: 'storage/' . $rutaImagen1);
            }

            if ($request->hasFile('imagen_producto_dos')) {
                $imagen2 = $request->file('imagen_producto_dos');
                $nuevoNombre2 = 'producto_' . time() . '_2.' . $imagen2->getClientOriginalExtension();
                $rutaImagen2 = $imagen2->storeAs('imagenes/productos', $nuevoNombre2, 'public');
                $rutaImagen2 = asset(path: 'storage/' . $rutaImagen2);
            }

            if ($request->hasFile('imagen_producto_tres')) {
                $imagen3 = $request->file('imagen_producto_tres');
                $nuevoNombre3 = 'producto_' . time() . '_3.' . $imagen3->getClientOriginalExtension();
                $rutaImagen3 = $imagen3->storeAs('imagenes/productos', $nuevoNombre3, 'public');
                $rutaImagen3 = asset(path: 'storage/' . $rutaImagen3);
            }

            DB::table('productos')->insert([
                'nombre' => $request-> nombre,
                'descripcion' => $request-> descripcion,
                'categoria_principal_id' => $request-> categoria_principal_id,
                'categoria_secundaria_id' => 1,
                'descuento_id' => $request-> descuento_id,
                'precio' => $request-> precio,
                'existencia' => $request-> existencia,
                'estatus' => 'ACTIVO',
                'imagen_producto_uno' => $rutaImagen1,
                'imagen_producto_dos' => $rutaImagen2,
                'imagen_producto_tres'=> $rutaImagen3,
                'fecha_creacion' => now(),
                'fecha_cambio' => now(),
            ]);  
        
            return redirect('/producto/listar');
    }




    public function editar(Request $request, $producto_id){
        $productos = DB::table('productos as p')
        ->join('categoria_principal as cap', 'p.categoria_principal_id', '=', 'cap.id')
        ->join('categoria_secundaria as cas', 'p.categoria_secundaria_id', '=', 'cas.id')
        ->join('descuentos as d', 'p.descuento_id', '=', 'd.id')
        ->select(
            'p.id as producto_id',
            'p.nombre as nombre_producto',
            'p.descripcion as descripcion_producto',
            'p.estatus',
            'p.precio',
            'p.existencia',
            'p.imagen_producto_uno',
            'p.imagen_producto_dos',
            'p.imagen_producto_tres',
            'cap.nombre as categoria_principal_id',
            // 'cas.nombre as nom_cat_secundaria',
            'd.id as descuento_id',
            'd.tipo',
            'd.valor',
            'd.descripcion as descripcion_descuento',
        )->where('p.id', $producto_id)
        ->first();

        // Obtener todos los descuentos
        $descuentos = DB::table('descuentos')->get();

        // Obtener todas las categorías
        $categorias = DB::table('categoria_principal')->get();
    

        
        return view('/producto/editar', compact('descuentos', 'categorias', 'productos'));     
    }

    public function actualizar(Request $request, $producto_id)
{
    $request->validate([
        'nombre_producto' => 'required|string|max:255',
        'descripcion_producto' => 'nullable|string',
        'categoria_principal_id' => 'required',
        'descuento_id' => 'required',
        'precio' => 'required|numeric',
        'existencia' => 'required|numeric',
        'imagen_producto_uno' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
        // 'imagen_producto_dos' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
        // 'imagen_producto_tres' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    

    // $rutaImagen1 = null;

    if ($request->hasFile('imagen_producto_uno')) {
        $imagen1 = $request->file('imagen_producto_uno');
        $nuevoNombre1 = 'producto_' . time() . '_1.' . $imagen1->getClientOriginalExtension();
        $rutaImagen1 = $imagen1->storeAs('imagenes/productos', $nuevoNombre1, 'public');
        $rutaImagen1 = asset('storage/' . $rutaImagen1);
    }

    DB::table('productos')
        ->where('id', $producto_id) // Filtra por el ID del producto
        ->update([
            'nombre' => $request->nombre_producto,
            'descripcion' => $request->descripcion_producto,
            'categoria_principal_id' => $request->categoria_principal_id,
            // 'categoria_secundaria_id' => 1, // Ajusta si es necesario
            'descuento_id' => $request->descuento_id,
            'precio' => $request->precio,
            'existencia' => $request->existencia,
            'estatus' => 'Activo',
            // 'imagen_producto_uno' => $rutaImagen1,
            'fecha_cambio' => now(),
        ]);

    return redirect('/producto/listar');
}


    public function mostrar(Request $request, $producto_id){
        $productos = DB::table('productos as p')
        ->join('categoria_principal as cap', 'p.categoria_principal_id', '=', 'cap.id')
        ->join('categoria_secundaria as cas', 'p.categoria_secundaria_id', '=', 'cas.id')
        ->join('descuentos as d', 'p.descuento_id', '=', 'd.id')
        ->select(
            'p.id as producto_id',
            'p.nombre as nombre_producto',
            'p.descripcion as descripcion_producto',
            'p.estatus',
            'p.precio',
            'p.existencia',
            'p.imagen_producto_uno',
            'p.imagen_producto_dos',
            'p.imagen_producto_tres',
            'cap.nombre as categoria_principal_id',
            // 'cas.nombre as nom_cat_secundaria',
            'd.id as descuento_id',
            'd.tipo',
            'd.valor',
            'd.descripcion as descripcion_descuento',
        )->where('p.id', $producto_id)
        ->first();

        // Obtener todos los descuentos
        $descuentos = DB::table('descuentos')->get();

        // Obtener todas las categorías
        $categorias = DB::table('categoria_principal')->get();
    

        
        return view('/producto/mostrar', compact('descuentos', 'categorias', 'productos'));     
    }



    public function eliminar(Request $request, $id_producto){
        // \Illuminate\Support\Facades\Gate::authorize('eliminar');
        DB::table('productos')
        ->where('id', '=', $id_producto)
        ->update([
            'estatus' => 'Inactivo',
        ]);
            return redirect('/producto/listar');
    }
    
   
}