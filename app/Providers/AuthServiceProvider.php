<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Policies\SubscriberPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => SubscriberPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // using gates for only subscriber
        Gate::define('subs-only', function (User $user) {
            if($user->subs == 1){
                return true;
            }
            return false;
        });

        // using policies for only subsciber
        Gate::define('subsciber-only','App\Policies\SubscriberPolicy@subsciber_only');
    }
}
