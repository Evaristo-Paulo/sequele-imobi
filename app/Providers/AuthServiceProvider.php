<?php

namespace App\Providers;

use App\Flat;
use App\Block;
use App\Business;
use App\Entrance;
use App\Interest;
use App\Topology;
use App\Available;
use App\Apartament;
use App\Condiction;
use App\Negociable;
use App\Models\Role;
use App\Models\Gender;
use App\Models\Province;
use App\Models\RoleUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        if (!app()->runningInConsole() || app()->runningUnitTests()) {

            Gate::define('just-admin-and-manager', function ($user) {
                return $user->hasAnyRoles(['admin', 'manager']);
            });
            Gate::define('just-admin-and-collaborator', function ($user) {
                return $user->hasAnyRoles(['admin', 'collaborator']);
            });
            Gate::define('only-admin', function ($user) {
                return $user->hasRole('admin');
            });
            Gate::define('only-collaborator', function ($user) {
                return $user->hasRole('collaborator');
            });

            $roles = Role::all();
            $genders = Gender::all();
            $roles_users = RoleUser::all();
            $provinces = Province::all();
            $blocks = Block::all();
            $flats = Flat::all();
            $entrances = Entrance::all();
            $condictions = Condiction::all();
            $negociables = Negociable::all();
            $topologies = Topology::all();
            $businesses = Business::all();
            $availables = Available::all();
            $function = new Interest();
            View::share(compact('negociables', 'function', 'topologies', 'businesses', 'availables', 'roles', 'genders', 'roles_users', 'provinces', 'blocks', 'flats', 'entrances', 'condictions'));
        }
    }
}
