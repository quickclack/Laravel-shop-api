<?php

declare(strict_types=1);

namespace App\Support\Logging\Telegram;

use Monolog\Logger;
use Monolog\LogRecord;
use App\Jobs\Logger\TelegramLoggerJob;
use Monolog\Handler\AbstractProcessingHandler;

final class TelegramLoggerHandler extends AbstractProcessingHandler
{
    public function __construct(array $config)
    {
        $level = Logger::toMonologLevel($config['level']);

        parent::__construct($level);

        $this->chatId = (int) $config['chat_id'];
        $this->token = $config['token'];
    }

    protected function write(LogRecord $record): void
    {
        TelegramLoggerJob::dispatch($this->token, $record->formatted, $this->chatId)
            ->delay(now()->addSeconds(10));
    }
}
