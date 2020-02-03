<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('demo', function ($user) {
          return true;
        });

         Gate::define('view', function ($user) {
						if (!$user) { return false; }
            return $user->role->first()->role >= 1;
         });

         Gate::define('update', function ($user) {
						if (!$user) { return false; }
             return $user->role->first()->role >= 2;
         });


         Gate::define('edit', function ($user) {
						if (!$user) { return false; }
             return $user->role->first()->role >= 3;
         });

         Gate::define('add', function ($user) {
						if (!$user) { return false; }
             return $user->role->first()->role >= 4;
         });

         Gate::define('master', function($user) {
						if (!$user) { return false; }
             return $user->role->first()->role >= 5;
         });

    }
}
