<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Services\UserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\User\UserResource;

final class UserController extends Controller
{
    public function __construct(
        private readonly UserService $userService,
    ) {
    }

    public function showProfile(): UserResource
    {
        return new UserResource(
            $this->userService->findById(Auth::id())
        );
    }
}
