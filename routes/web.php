<?php

use App\Http\Controllers\AdministradorAuthController;
use App\Http\Controllers\administradorController;
use App\Http\Controllers\ClientesAuthController;
use App\Http\Controllers\clientesController;
use App\Http\Controllers\productoController;
use App\Http\Controllers\pedidosController;
use App\Http\Controllers\resenasController;
use App\Http\Controllers\PdfController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//inicio sesion
Route::get('/', function () {
    return view('/login/inicio_sesion');
})->name('login');


// autenticador del admin
Route::post('/admin/login',[AdministradorAuthController::class,'authenticate'])
->name('admin.login');
Route::post('/admin/logout',[AdministradorAuthController::class,'auth'])
->name('admin.logout');



// Route::middleware('auth:client')->group(function(){
Route::middleware(['auth:admin'])->group(function(){

    Route::view('/plantilla','/base/layout')->name('plantilla');

    // Rutas solo para administradore SUPER
    Route::get('/Administrador/listado', [AdministradorController::class, 'listar'])
    ->name('administradores');

    Route::get('/Administrador/crear',[administradorController::class,'formulario'])
    ->name('crear_administrador');

    Route::delete('/Administrador/{id}/borrar',[administradorController::class,'borrar'])
    ->name('borrar_administrador');

    Route::post('/Administrador/guardar',[administradorController::class,'store'])
    ->name('guardar_administrador');

    Route::get('/Administrador/{id}/editar',[administradorController::class,'editar'])
    ->name('editar_administrador');

    Route::put('/Administrador/{id}/actualizar',[administradorController::class,'actualizar'])
    ->name('actualizar_administrador');

    Route::get('/Administrador/{id}/mostrar',[administradorController::class,'mostrar'])
    ->name('mostrar_administrador');












// Route::view('/plantilla', '/base/layout');
Route::view('/productos', '/base/productos');

Route::get('/registrar',[clientesController::class,'formulario']);

Route::post('/clientes/guardar',[clientesController::class,'guardar']);

Route::get('/cliente/listar',[clientesController::class,'listar']);

//editar cliente
Route::get('/cliente/{id}/editar',[clientesController::class,'editar']);
//guardar datos editados
Route::put('/cliente/{id}/actulizar',[clientesController::class,'actulizar']);

//mostrar (no se puede modificar)
Route::get('/cliente/{id}/mostrar',[clientesController::class,'mostrar']);

// eliminar
Route::delete('/cliente/{id}/eliminar',[clientesController::class,'eliminar'])->name('eliminar_cliente');

    //   Productos

    Route::get('/producto/listar', [productoController::class, 'listar']);
    Route::get('/producto/nuevos', [productoController::class, 'formulario']);
    Route::post('/producto/guardar', [productoController::class, 'guardar']);
    Route::get('/producto/{id}/editar', [productoController::class, 'editar']);
    Route::put('/producto/{id}/actualizar', [productoController::class, 'actualizar']);
    Route::delete('/producto/{id}/eliminar', [productoController::class, 'eliminar']);
    Route::get('/producto/{id}/mostrar', [productoController::class, 'mostrar']);

    // categoria_id
    Route::get('/producto/nueva_categoria', [productoController::class, 'formularioCategoria']);
    Route::post('/producto/guardar_categoria', [productoController::class, 'guardarCategoria']);


    //pedidos
    Route::get('/pedidos/listar', [pedidosController::class, 'listar']);

    Route::put('/pedidos/{id}/actualizar', [pedidosController::class, 'registrarPagoReferencia']);
    Route::get('/pedidos/{id}/mostrar', [pedidosController::class, 'mostrar_detalles_orden']);

    //resenas
    Route::get('/resenas/listar', [resenasController::class, 'listar_resenas'])->name('listar_resenas');
    Route::put('/resenas/{id}/actualizar', [resenasController::class, 'actualizar_resena'])->name('actualizar_resena');


    Route::get('/resumenVentas', [PdfController::class,'resumenVentas'])->name('resumenVentas');
    Route::get('/descargar/resumenVentas', [PdfController::class,'generadorPDF'])->name('descargar-resumenVentas');
    
    Route::get('/filtro/resumenVentas', [PdfController::class,'filtro'])->name('filtro-resumenVentas');

    // Route::view('/import', 'PDF/importPDF');

    
});


//recuperar Cuenta
Route::get('/recuperar/cuenta',[clientesController::class],'listarInactivos');





Route::view('/copycrear', '/cliente/copycrear');


// SuperAdminE
// 123456789


//  Route::get('/registro', function(){
//      DB:: table('administradores')->insert( [

//      'nombre'=> 'SuperAdmin',
//      'nombre_usuario'=> 'SuperAdministrador',
//      'contrasena'=> Hash::make('utj'),
//      'img_perfil'=> 'storage/administradores/admin_default.jpeg',
//      'rango_id'=> 1,
//      'estatus'=> 'activo',
//      'apellido_paterno' => 'prueba',
//      'apellido_materno' => 'prueba',
//      'correo' => 'prueba@gmail.com',
//       ]);
//           return "usuario registrado";
//  });

//  Route::get('/registroreferencia', function(){
//     DB:: table('pagos_referencias')->insert( [

//     'numero_operacion'=> '1',
//     'fecha_trasferencia'=> '2024-11-29',
//     'hora_trasferencia'=> '15:30:00',
//     'concepto'=> '1',
//      ]);
//     return "referencia registrado";
// });


// pruebaSuperAdmin
// utj

//pruebaMedioAdmin
// utj

// pruebaBase
// utj
