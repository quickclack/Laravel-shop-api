<?php

declare(strict_types=1);

namespace App\Support\Logging\Telegram;

use Monolog\Logger;

final class TelegramLoggerFactory
{
    public function handle(array $config): Logger
    {
        $logger = new Logger('telegram');

        $logger->pushHandler(new TelegramLoggerHandler($config));

        return $logger;
    }
}
