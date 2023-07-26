<?php

declare(strict_types=1);

namespace Tests\Feature\App\Controllers\Api\Auth;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Testing\TestResponse;
use App\Http\Controllers\Api\Auth\RegisteredController;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisteredControllerTest extends TestCase
{
    use DatabaseTransactions;

    protected array $request;

    public function setUp(): void
    {
        parent::setUp();

        $this->request = [
            'name' => 'Test',
            'email' => 'test@mail.com',
            'password' => '12345qwertyWWW',
            'password_confirmation' => '12345qwertyWWW',
        ];
    }

    public function test_is_validation_success(): void
    {
        $this->request()
            ->assertValid();
    }

    public function test_it_should_validation_on_password_confirm(): void
    {
        $this->request['password'] = 123;
        $this->request['password_confirmation'] = 1234;

        $this->request()
            ->assertInvalid(['password']);
    }

    public function test_it_user_created_success(): void
    {
        $this->assertDatabaseMissing('users', [
            'email' => $this->request['email']
        ]);

        $this->request();

        $this->assertDatabaseHas('users', [
            'email' => $this->request['email']
        ]);
    }

    public function test_it_should_fail_validation_on_unique_email(): void
    {
        User::factory()
            ->createOne([
                'email' => $this->request['email']
            ]);

        $this->assertDatabaseHas('users', [
            'email' => $this->request['email']
        ]);

        $this->request()
            ->assertInvalid();
    }

    private function request(array $headers = []): TestResponse
    {
        return $this->post(action([RegisteredController::class, 'store'],
            $this->request), $headers);
    }

    private function findUser(): User
    {
        return User::query()
            ->where('email', $this->request['email'])
            ->first();
    }
}
