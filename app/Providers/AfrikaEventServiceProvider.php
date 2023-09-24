<?php
namespace App\Providers;
use App\Services;
use Illuminate\Support\ServiceProvider;
class AfrikaEventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AfrikaEventService::class, function($app) {
            return new AfrikaEventService();
        });
    }
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}