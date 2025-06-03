<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        $this->registerPolicies();
        Gate::define('administrador', function ($user) {
           $role = $user->role_id;
              return $role === 1;
        });
        Gate::define('supervisor', function ($user) {
            $role = $user->role_id;
            return $role === 2;
        });
        Gate::define('admin-supervisor', function ($user) {
            $role = $user->role_id;
            return $role === 3;
        });
    }
}
