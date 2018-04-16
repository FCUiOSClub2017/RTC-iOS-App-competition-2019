<?php

namespace App\Providers;

use URL;
use Illuminate\Support\ServiceProvider;
use App\TeamMember;
use App\Observers\TeamMemberObserver;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \URL::forceScheme('https');
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
