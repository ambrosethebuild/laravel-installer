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

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/installer.php');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'installer');
        $this->publishes([
            __DIR__.'/../config/installer.php' => config_path('installer.php'),
        ], 'installer-config');
        $this->publishes([
            __DIR__.'/../resources/fonts' => public_path('fonts'),
        ], 'installer-fonts');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/installer.php', 'installer'
        );
    }
}
