<?php

declare(strict_types=1);

namespace App\Support\Traits;

use Illuminate\Http\JsonResponse;

trait JsonWrapper
{
    public function getToken(string $token): JsonResponse
    {
        return new JsonResponse([
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }
}
