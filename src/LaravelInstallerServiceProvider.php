<?php

namespace AmbroseTheBuild\LaravelInstaller;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use AmbroseTheBuild\LaravelInstaller\Commands\LaravelInstallerCommand;

class LaravelInstallerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-installer')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_installer_table')
            ->hasCommand(LaravelInstallerCommand::class);
    }
}
