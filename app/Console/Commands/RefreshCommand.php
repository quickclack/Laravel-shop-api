<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;

final class RefreshCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'shop:refresh';

    /**
     * @var string
     */
    protected $description = 'Refresh migration in database';

    public function handle(): int
    {
        if (app()->isProduction()) {
            return self::FAILURE;
        }

        $this->call('migrate:fresh', [
            '--seed' => true
        ]);

        return Command::SUCCESS;
    }
}
