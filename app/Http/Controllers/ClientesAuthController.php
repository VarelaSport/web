<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Cliente;

class ClientesAuthController extends Controller
{

    
    /**
     * Handle an authentication attempt.
     */

    // funcion para autenticar
    public function authenticate(Request $request)
    {       
        $credentials = $request->validate([
            'usuario' => ['required'],
            'contrasena' => ['required'],
        ]);

         $cliente = Cliente::where('usuario',$request->usuario)
         ->where('estatus','activo')
         ->first();



        //  dd(Hash::check($request->contrasena, $admin->contrasena));
         if($cliente && Hash::check($request->contrasena, $cliente->contrasena)){
             Auth::guard('client')->login($cliente);
             $request->session()->regenerate();

              return redirect()->intended('/productos');
         }


        return back()->withErrors([
            'contrasena' => 'Los datos introducidos no fueron encontrados',
        ])->onlyInput('usuario');
    }


    // funcion para cerrar sesion
    public function auth(Request $request){

        Auth::logout();
 
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();

        // redireccionar a login
        return redirect('/');
    }
}
