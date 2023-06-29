<?php

declare(strict_types=1);

namespace App\Listeners\Mail;

use App\Services\Minify\HtmlMinify;
use Illuminate\Mail\Events\MessageSending;

final class MinifyHtmlMail
{
    public function __construct(
        private HtmlMinify $htmlMinify,
    ) {
    }

    public function handle(MessageSending $event): bool
    {
        $html = $event->message->getHtmlBody();

        if (!empty($html)) {
            $event->message->html(
                $this->htmlMinify->minify($html),
                $event->message->getHtmlCharset(),
            );
        }

        return true;
    }
}
