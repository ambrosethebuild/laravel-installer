<?php

use Illuminate\Support\Facades\Route;
use AmbroseTheBuild\LaravelInstaller\Http\Controllers\InstallerController;

Route::prefix('installer')->group(function () {
    Route::get('/', [InstallerController::class, 'welcome'])->name('installer.welcome');
    Route::get('/requirements', [InstallerController::class, 'requirements'])->name('installer.requirements');
    Route::post('/requirements/continue', [InstallerController::class, 'requirementsContinue'])->name('installer.requirements-continue');
    Route::get('/permissions', [InstallerController::class, 'permissions'])->name('installer.permissions');
    Route::post('/permissions/continue', [InstallerController::class, 'permissionsContinue'])->name('installer.permissions-continue');
    Route::get('/env', [InstallerController::class, 'env'])->name('installer.env');
    Route::post('/env/continue', [InstallerController::class, 'envContinue'])->name('installer.env-continue');
    Route::get('/migrate', [InstallerController::class, 'migrate'])->name('installer.migrate');
    Route::post('/migrate/continue', [InstallerController::class, 'migrateContinue'])->name('installer.migrate-continue');
    Route::get('/complete', [InstallerController::class, 'complete'])->name('installer.complete');
}); 