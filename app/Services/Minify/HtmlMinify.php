<?php

declare(strict_types=1);

namespace App\Services\Minify;

final class HtmlMinify
{
    public function minify(string $content): string
    {
        return preg_replace([
            '/ {2,}/',
            '/\t|(?:\r?\n[\t]*)+/s',
        ], [
            ' ',
            '',
        ],
            $content,
        );
    }
}

