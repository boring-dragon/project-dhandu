<?php

namespace App\Providers;

use App\View\Components\Stats;
use App\View\Components\SensorTable;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::component('stats-component', Stats::class);
        Blade::component('sensor-table', SensorTable::class);
    }
}
