<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

final class InstallCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'shop:install';

    /**
     * @var string
     */
    protected $description = 'Installation project';

    public function handle(): int
    {
        $this->call('key:generate');
        $this->call('migrate', [
            '--seed' => true
        ]);

        return Command::SUCCESS;
    }
}
