<?php

namespace Lumki\Lumki;

use Illuminate\Support\Facades\Route;
use Lumki\Lumki\Commands\LumkiCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LumkiServiceProvider extends PackageServiceProvider
{
    public function boot()
    {
        // ... other things
        $this->registerRoutes();
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'lumki');
        $this->publishes([
            __DIR__.'/config/lumki.php' => config_path('lumki.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/lumki'),
        ], 'views');

        $this->publishes([
            __DIR__.'/../resources/js/Pages' => base_path('resources/js/Pages/Lumki'),
        ], 'lumki-pages');

        $this->publishes([
            __DIR__.'/../src/Http/Controllers/PostController.php' => base_path('app/Http/Controllers'),
        ], 'lumki-controllers');
    }

    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
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
}
