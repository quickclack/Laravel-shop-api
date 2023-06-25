<?php

declare(strict_types=1);

namespace App\Services\Telegram;

use Throwable;
use Illuminate\Support\Facades\Http;
use App\Services\Telegram\Exceptions\TelegramBotApiException;

final class TelegramBotApi
{
    private const HOST = 'https://api.telegram.org/bot';

    public static function getHost(): string
    {
        return self::HOST;
    }

    public static function sendMessage(string $token, int $chatId, string $text): bool
    {
        try {
            $response = Http::get(self::HOST . $token . '/sendMessage', [
                'chat_id' => $chatId,
                'text' => $text
            ])
                ->throw()
                ->json();

            return $response['ok'] ?? false;

        } catch (Throwable $exception) {
            report(new TelegramBotApiException($exception->getMessage()));

            return false;
        }
    }
}
