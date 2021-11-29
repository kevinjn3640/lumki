<?php

namespace Lumki\Lumki;

use Lumki\Lumki\Commands\LumkiCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Illuminate\Support\Facades\Route;

class LumkiServiceProvider extends PackageServiceProvider
{
    public function boot()
    {
        // ... other things
        $this->registerRoutes();
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
