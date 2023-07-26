<?php

declare(strict_types=1);

namespace Tests\Feature\App\Jobs\Logger;

use Tests\TestCase;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Queue;
use App\Jobs\Logger\TelegramLoggerJob;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TelegramLoggerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_it_sending_log_success(): void
    {
        $queue = Queue::getFacadeRoot();

        $token = Str::random(14);
        $text = 'This is test text';
        $chatId = '34451212';

        Queue::fake([TelegramLoggerJob::class]);

        Queue::swap($queue);

        TelegramLoggerJob::dispatchSync($token, $text, $chatId);

        $this->assertDatabaseEmpty('failed_jobs');
    }
}
