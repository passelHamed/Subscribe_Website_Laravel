<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\website;
use App\Models\post;
use App\Models\User;
use App\Policies\userPolicy;
use App\Policies\websitePolicy;
use App\Policies\postPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        website::class => websitePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
