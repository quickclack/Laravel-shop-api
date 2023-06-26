<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RemoveHeaders
{
    protected array $removeHeaders = [
        'X-Powered-By',
        'x-powered-by',
        'Server',
        'server',
    ];

    public function handle(Request $request, Closure $next): Response
    {
        /** @var Response $response */
        $response = $next($request);

        foreach ($this->removeHeaders as $header) {
            header_remove($header);

            $response->headers->remove(key: $header);
        }

        return $response;
    }
}
