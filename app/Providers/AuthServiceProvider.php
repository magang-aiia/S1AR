<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function ($user) {
            return $user->jabatan->kode == 'ADMIN';
        });

        Gate::define('isAtasan', function ($user) {
            return $user->jabatan->level_user_id > '1' && $user->jabatan->level_user_id < '8';
        });

        Gate::define('isUser', function ($user) {
            return $user->jabatan->kode != 'ADMIN';
        });

        //
    }
}
