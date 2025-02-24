<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Administradore extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    // const ROLE_SUPERADMIN = 'SuperAdmin';
    const ROLE_SUPERADMIN = 1;
    const ROLE_MEDIOADMIN = 2;
    const ROLE_PISO = 3;
    // const ROLE_MEDIOADMIN = 'MedioAdmin';
    // const ROLE_PISO = 'Piso';


    protected $fillable = [
        'rango_id',
        'nombre_usuario',
        'contrasena',
    ];


    //  public function isSuperAdmin()
    //  {
    //      return $this->rol === self::ROLE_SUPERADMIN;
    //  }

    // public function isMedioAdmin()
    // {
    //     return $this->rol === self::ROLE_MEDIOADMIN;
    // }

    // public function isPiso()
    // {
    //     return $this->rol === self::ROLE_PISO;
    // }
}

