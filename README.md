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

You can install the package via composer:

```bash
composer require ambrosethebuild/laravel-installer
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-installer-config"
```

This is the contents of the published config file:

```php
return [
    'required_extensions' => [
        'openssl', 'pdo', 'mbstring', 'tokenizer', 'xml', 'ctype', 'json', 'bcmath',
    ],
    'folders' => [
        'storage/logs',
        'bootstrap/cache',
        'storage/framework',
    ],
];
```

## Usage

To automatically redirect users to the installer until it is completed, you can add the following check in the `boot` method of your `App\Providers\AppServiceProvider.php`:

```php
use AmbroseTheBuild\LaravelInstaller\LaravelInstaller;

public function boot(): void
{
    if (!app()->runningInConsole() && !LaravelInstaller::isInstalled() && !request()->is('installer*')) {
        redirect('/installer/welcome')->send();
    }
}
```

This will ensure that all web requests are sent to the installer wizard until the installation is finished. Once completed, a flag file is created in your storage directory, and this redirect will no longer trigger.


## Tailwind CSS Configuration (Important)

If your Laravel project uses Tailwind CSS and you are running `npm run build` or `npm run prod`, you must add the package's views to your `tailwind.config.js` file. This prevents the styles used in the installer from being purged during the production build:

```javascript
/** @type {import('tailwindcss').Config} */
export default {
    content: [
        // ... your other content paths
        './vendor/ambrosethebuild/laravel-installer/resources/views/**/*.blade.php',
    ],
    // ...
}
```


## Publish Fonts

After installation, publish the Poppins font files to your public directory:

```sh
php artisan vendor:publish --tag=laravel-installer-fonts
```

## Testing

```bash
composer test
```