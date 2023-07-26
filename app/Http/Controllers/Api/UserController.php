<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Contracts\UserRepository;

final class UserController extends Controller
{
    public function __construct(
        private readonly UserRepository $repository,
    ) {
    }

    public function showProfile(): UserResource
    {
        return new UserResource(
            $this->repository->findById(Auth::id())
        );
    }
}
