<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Auth;

use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

final class AuthenticatedController extends Controller
{
    public function __construct(
        private readonly UserService $userService,
    ) {
    }

    public function store(LoginRequest $request): JsonResponse
    {
        $request->authenticate();

        $user = $this->userService
            ->findByEmail(email: $request->getEmail());

        return $this->getToken(
            $user->createToken('auth_token')->plainTextToken,
        );
    }

    public function logout(): JsonResponse
    {
        Auth::user()->tokens()?->delete();

        return new JsonResponse([
            'message' => __('auth.success_logout'),
        ]);
    }
}
