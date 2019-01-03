<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        'App\NewEvent' => 'App\Policies\EventPolicy',
        'App\Organization' => 'App\Policies\OrganizationPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('be-organizer', function ($user) {
            return $user->role == 'organizer';
        });

        Gate::define('be-participant', function ($user) {
            return $user->role == 'participant';
        });

        Gate::define('premium-access', function ($user) {
            return $user->membership == 'gold' || $user->membership == 'platinum';
        });

        /* move to EventPolicy
        Gate::define('edit-event', function($user, $new_event) {
            return $user->id == $new_event->organizer_id;
        });

        Gate::define('join-event', function($user, $new_event) {
            return $user->role == 'participant' && $new_event->published;
        });
        */
    }
}
