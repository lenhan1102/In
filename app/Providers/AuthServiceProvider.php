<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Dish' => 'App\Policies\DishPolicy',
        'App\Menu' => 'App\Policies\MenuPolicy',
        'App\Order' => 'App\Policies\OrderPolicy',
        'App\User' => 'App\Policies\AccountPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        //
        $gate->define('go_to_provider', function ($user) {
            return $user->hasRole('Provider');
        });
        $gate->define('go_to_admin', function ($user) {
            return $user->hasRole('Admin');
        });
    }
}
