<?php

namespace AmbroseTheBuild\LaravelInstaller;

class LaravelInstaller
{
    public static function isInstalled(): bool
    {
        return file_exists(storage_path('installer_completed'));
    }
}
