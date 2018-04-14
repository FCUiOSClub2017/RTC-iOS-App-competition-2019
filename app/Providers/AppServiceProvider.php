<?php

namespace App\Providers;

use URL;
use Illuminate\Support\ServiceProvider;
use App\TeamMember;
use App\Observers\TeamMemberObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        TeamMember::observe(TeamMemberObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
