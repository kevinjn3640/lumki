<?php

namespace Lumki\Lumki;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Lumki\Lumki\Commands\LumkiCommand;

class LumkiServiceProvider extends PackageServiceProvider
{
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
