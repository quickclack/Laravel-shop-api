<?php

namespace App\Jobs\Logger;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\Telegram\TelegramBotApi;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class TelegramLoggerJob implements ShouldQueue
{
    use Queueable;
    use Dispatchable;
    use SerializesModels;
    use InteractsWithQueue;

    public function __construct(
        protected string $token,
        protected string $text,
        protected int $chatId,
    ) {
    }

    public function handle(): void
    {
        TelegramBotApi::sendMessage($this->token, $this->chatId, $this->text);
    }
}
