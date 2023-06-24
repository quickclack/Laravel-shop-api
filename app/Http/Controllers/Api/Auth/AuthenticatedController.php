<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Repositories\Contracts\UserRepository;
use Illuminate\Support\Facades\Auth;

final class AuthenticatedController extends Controller
{
    public function __construct(
        private readonly UserRepository $repository
    ) {
    }

    public function store(LoginRequest $request): JsonResponse
    {
        $request->authenticate();

        $user = $this->repository
            ->findByEmail(email: $request->getEmail());

        return $this->getToken(
            $user->createToken('auth_token')->plainTextToken
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
