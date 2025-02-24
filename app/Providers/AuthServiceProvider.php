<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Gate;
use App\Models\Administradore;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('SuperAdmin',function(Administradore $admins){
            return $admins->rango_id == Administradore::ROLE_SUPERADMIN;
        });

        Gate::define('eliminar',function(Administradore $admins){
            return $admins->rango_id == Administradore::ROLE_SUPERADMIN || $admins->rango_id == Administradore::ROLE_MEDIOADMIN;
        });
    }
}
