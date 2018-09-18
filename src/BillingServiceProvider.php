<?php

namespace Cierrateam\Billing;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class BillingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Router $router)
    {

        $this->publishes([
            __DIR__.'/Config/billing.php' => config_path('billing.php'),
        ], 'billing_config');

        $this->loadRoutesFrom(__DIR__ . '/Routes/api.php');

        $this->loadMigrationsFrom(__DIR__ . '/Migrations');

        $this->loadTranslationsFrom(__DIR__ . '/Translations', 'billing');

        $this->publishes([
            __DIR__ . '/Translations' => resource_path('lang/vendor/billing'),
        ]);


        // Consle part

        if ($this->app->runningInConsole()) {
            $this->commands([
                \Cierrateam\Billing\Commands\BillingCommand::class,
            ]);
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/Config/billing.php', 'billing'
        );
    }
}
