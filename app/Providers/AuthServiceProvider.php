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
            return $user->bagian->kode == 'ADMIN';
        });

        Gate::define('isAtasan', function ($user) {
            return $user->bagian->jabatan_id > '1' && $user->bagian->jabatan_id < '8';
        });

        Gate::define('isAdminOrAtasan', function ($user) {
            return  $user->bagian->jabatan_id > '1';
        });

        Gate::define('isUser', function ($user) {
            return $user->bagian->kode != 'ADMIN';
        });

        //
    }
}
