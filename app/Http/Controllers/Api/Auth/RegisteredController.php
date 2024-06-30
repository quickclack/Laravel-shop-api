<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Auth;

use App\DTO\User\CreateDTO;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisteredRequest;

final class RegisteredController extends Controller
{
    public function __construct(
        private readonly UserService $userService,
    ) {
    }

    public function store(RegisteredRequest $request): JsonResponse
    {
        $user = $this->userService->create(
            (new CreateDTO($request->name, $request->email, $request->password))
                ->toArray()
        );

        return $this->getToken(
            $user->createToken('auth_token')->plainTextToken
        );
    }
}
