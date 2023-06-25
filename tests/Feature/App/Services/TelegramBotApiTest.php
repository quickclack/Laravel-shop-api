<?php

declare(strict_types=1);

namespace Tests\Feature\App\Services;

use Tests\TestCase;
use Illuminate\Support\Facades\Http;
use App\Services\Telegram\TelegramBotApi;

class TelegramBotApiTest extends TestCase
{
    public function test_it_send_message_success(): void
    {
        Http::fake([
            TelegramBotApi::getHost() . '*' => Http::response(['ok' => true])
        ]);

        $result = TelegramBotApi::sendMessage('', 1, 'Testing');

        $this->assertTrue($result);
    }
}
