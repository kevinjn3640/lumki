<?php

namespace Lumki\Lumki;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Lumki\Lumki\Commands\LumkiCommand;
use Spatie\LaravelPackageTools\Package;

class LumkiServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerRoutes();
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'lumki');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'lumki');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
//        $this->loadRoutesFrom(__DIR__ . '/routes.php');
//        $this->registerBladeDirectives();

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }

    protected function routeConfiguration()
    {
        return [
            'prefix' => config('lumki.prefix'),
//            'middleware' => config('lumki.middleware'),
        ];
    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('lumki')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_lumki_table')
            ->hasCommand(LumkiCommand::class);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/lumki.php', 'lumki');

        // Register the service the package provides.
        $this->app->singleton('lumki', function ($app) {
            return new Lumki;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return ['lumki'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__ . '/../config/lumki.php' => config_path('lumki.php'),
        ], 'lumki.config');

        // Publishing the views.
        $this->publishes([
            __DIR__ . '/../resources/views' => base_path('resources/views/vendor/lumki'),
        ], 'lumki.views');

        $this->publishes([
            __DIR__ . '/../resources/js/Pages' => base_path('resources/js/Pages/Lumki'),
        ], 'lumki.pages');

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/kineticamobile'),
        ], 'lumki.views');*/

        // Publishing the translation files.
//        $this->publishes([
//            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/kineticamobile'),
//        ], 'lumki.views');

        // Registering package commands.
        $this->commands([
            Commands\LumkiCommand::class,
        ]);
    }
}
