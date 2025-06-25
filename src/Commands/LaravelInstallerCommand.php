<?php

namespace AmbroseTheBuild\LaravelInstaller\Commands;

use Illuminate\Console\Command;

class LaravelInstallerCommand extends Command
{
    public $signature = 'laravel-installer';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
