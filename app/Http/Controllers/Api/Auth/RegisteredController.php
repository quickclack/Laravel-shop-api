<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\Auth;

use App\DTO\User\CreateDTO;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisteredRequest;
use App\Repositories\Contracts\UserRepository;

final class RegisteredController extends Controller
{
    public function __construct(
        private readonly UserRepository $repository,
    ) {
    }

    public function store(RegisteredRequest $request): JsonResponse
    {
        $user = $this->repository->create(
            (new CreateDTO($request->name, $request->email, $request->password))
                ->toArray()
        );

        return $this->getToken(
            $user->createToken('auth_token')->plainTextToken
        );
    }
}
