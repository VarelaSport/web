<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\HASH;
use App\Models\Administradore;

class AdministradorAuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     */

    public function authenticate(Request $request)
    {
        //  dd($request->all());
        $credentials = $request->validate([
            'nombre_usuario' => ['required'],
            'contrasena' => ['required']
        ]);




        $admins=Administradore::where('nombre_usuario',$request->nombre_usuario)
        ->where('estatus','Activo')
        ->first();



        //dd($admin);
        // dd(Hash::check($request->contrasena, $admins->contrasena));



        if ($admins && Hash::check($request->contrasena, $admins->contrasena)){
            //return "jhfhf";
            Auth::guard('admin')->login($admins);
            $request->session()->regenerate();

             return redirect()->intended('/plantilla');
            }

        return back()->withErrors([
            'nombre_usuario' => 'Los datos ingresados no fueron encontrados.',
        ])->onlyInput('nombre_usuario');
    }

    public function auth(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
