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
        $router->aliasMiddleware('billing', \Cierrateam\Billing\Middleware\BillingMiddleware::class);

        $this->publishes([
            __DIR__.'/Config/billing.php' => config_path('billing.php'),
        ], 'billing_config');

        $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');

        $this->loadMigrationsFrom(__DIR__ . '/Migrations');

        $this->loadTranslationsFrom(__DIR__ . '/Translations', 'billing');

        $this->publishes([
            __DIR__ . '/Translations' => resource_path('lang/vendor/billing'),
        ]);

        $this->loadViewsFrom(__DIR__ . '/Views', 'billing');

        $this->publishes([
            __DIR__ . '/Views' => resource_path('views/vendor/billing'),
        ]);

        $this->publishes([
            __DIR__ . '/Assets' => public_path('vendor/billing'),
        ], 'billing_assets');

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
