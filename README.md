![Laravel Installer Banner](https://banners.beyondco.de/Laravel-Installer.png?theme=light&packageManager=composer+require&packageName=ambrosethebuild%2Flaravel-installer&pattern=architect&style=style_1&description=Laravel+system+install.+Helps+with+checks+before+installing+project+on+server&md=1&showWatermark=1&fontSize=100px&images=badge-check)



[![Latest Version on Packagist](https://img.shields.io/packagist/v/ambrosethebuild/laravel-installer.svg?style=flat-square)](https://packagist.org/packages/ambrosethebuild/laravel-installer)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/ambrosethebuild/laravel-installer/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/ambrosethebuild/laravel-installer/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/ambrosethebuild/laravel-installer/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/ambrosethebuild/laravel-installer/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/ambrosethebuild/laravel-installer.svg?style=flat-square)](https://packagist.org/packages/ambrosethebuild/laravel-installer)

# Laravel Installer

A beautiful, step-by-step installer for Laravel projects. This package helps you verify your server environment, check required PHP extensions and folder permissions, edit your `.env` file, and run migrations—all before your app goes live.

**Features:**
- System requirements and PHP extension checks
- Folder permission checks
- Easy .env editor
- Database migration runner
- Modern, responsive UI (no external CSS dependencies)
- Progress is tracked and resumable

Get your Laravel app production-ready with confidence and ease!

## Installation

If the package is not yet published on Packagist, you can install it directly from your Git repository using Composer's VCS repository feature:

1. **Add the package as a VCS repository in your Laravel project's `composer.json`:**

    ```json
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/ambrosethebuild/laravel-installer.git"
        }
    ]
    ```

2. **Require the package in your Laravel project:**

    ```sh
    composer require ambrosethebuild/laravel-installer:dev-main
    ```

3. **Publish the config (optional):**

    ```sh
    php artisan vendor:publish --provider="AmbroseTheBuild\LaravelInstaller\LaravelInstallerServiceProvider"
    ```

4. **Visit `/installer` in your browser to start the installation wizard.**

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-installer-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-installer-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="laravel-installer-views"
```

## Publish Fonts

After installation, publish the Poppins font files to your public directory:

```sh
php artisan vendor:publish --tag=installer-fonts
```

## Testing

```bash
composer test
```