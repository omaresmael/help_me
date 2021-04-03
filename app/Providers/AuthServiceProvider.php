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
         'App\Models\Period' => 'App\Policies\PeriodPolicy',
         'App\Models\Report' => 'App\Policies\ReportPolicy',
         'App\Models\School' => 'App\Policies\SchoolPolicy',
         'App\Models\Student' => 'App\Policies\StudentPolicy',
         'App\Models\Sitting' => 'App\Policies\SittingPolicy',
         'App\Models\Teacher' => 'App\Policies\TeacherPolicy',
         'App\User' => 'App\Policies\UserPolicy',
         'App\Models\Fine' => 'App\Policies\FinePolicy',
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
