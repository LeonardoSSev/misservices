<?php

namespace App\Providers;


use App\Permission;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
      //  'App\Models\Service::class' => 'App\Policies\JobPolicy::class',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(Gate $gate)
    {
        $this->registerPolicies();

        if (Schema::hasTable('permissions')) {
            $permissions = Permission::with('roles')->get();

            foreach ($permissions as $permission) {
                $gate->define($permission->name, function (User $user) use ($permission) {
                    return $user->hasPermission($permission);
                });
            }

            $gate->before(function (User $user, $ability) {
                if ($user->hasAnyRoles('Admin'))
                    return true;
            });
        }

    }
}
