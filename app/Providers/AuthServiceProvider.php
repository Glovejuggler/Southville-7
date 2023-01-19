<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        Gate::define('isAdmin', function (User $user) {
            return $user->id === 1;
        });

        Gate::define('isChairman', function (User $user) {
            return $user->id === 1 || $user->member_id == Role::where('position','Chairman')->first()->member_id;
        });

        Gate::define('isViceChairman', function (User $user) {
            return $user->id === 1 || $user->member_id == Role::where('position','Vice Chairman')->first()->member_id;
        });

        Gate::define('isTreasurer', function (User $user) {
            return $user->id === 1 || $user->member_id == Role::where('position','Treasurer')->first()->member_id;
        });

        Gate::define('isSecretary', function (User $user) {
            return $user->id === 1 || $user->member_id == Role::where('position','Secretary')->first()->member_id;
        });
    }
}
