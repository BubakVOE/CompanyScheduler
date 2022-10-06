<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\Project;
use App\Models\ProjectUsers;
use App\Models\User;
use App\Models\WorkTime;
use App\Observers\CompanyObserver;
use App\Observers\ProjectObserver;
use App\Observers\ProjectUsersObserver;
use App\Observers\UserObserver;
use App\Observers\WorkTimeObserver;
/**/
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Company::observe(CompanyObserver::class);
        // Project::observe(ProjectObserver::class);
        // ProjectUsers::observe(ProjectUsersObserver::class);
        // User::observe(UserObserver::class);
        // WorkTime::observe(WorkTimeObserver::class);
    }
}
