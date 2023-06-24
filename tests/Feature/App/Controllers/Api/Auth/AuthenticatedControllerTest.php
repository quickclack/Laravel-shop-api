<?php

declare(strict_types=1);

namespace Tests\Feature\App\Controllers\Api\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Api\Auth\AuthenticatedController;

class AuthenticatedControllerTest extends TestCase
{
    use RefreshDatabase;

    private function createUser(): User
    {
        $password = '12334567';

        return User::factory()
            ->createOne([
                'email' => 'test1@mail.com',
                'password' => bcrypt($password)
            ]);
    }

    public function test_it_store_success(): void
    {
        $user = $this->createUser();

        $request = [
            'email' => $user->email,
            'password' => '12334567'
        ];

        $this->json('post', action([AuthenticatedController::class, 'store']), $request)
            ->assertValid();

        $this->assertAuthenticatedAs($user);
    }

    public function test_it_logout_success()
    {
        $user = $this->createUser();

        $token = $user->createToken('auth_token')
            ->plainTextToken;

        $this->post('api/auth/logout', ['Authenticated' => 'Bearer' . $token]);

        $this->assertGuest();
    }
}
