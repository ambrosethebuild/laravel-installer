<?php

namespace AmbroseTheBuild\LaravelInstaller\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \AmbroseTheBuild\LaravelInstaller\LaravelInstaller
 */
class LaravelInstaller extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \AmbroseTheBuild\LaravelInstaller\LaravelInstaller::class;
    }
}
