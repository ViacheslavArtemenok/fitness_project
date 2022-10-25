<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '+79999999999',
            'role'        => User::IS_TRAINER,
            'password' => '11111111',
            'password_confirmation' => '11111111',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::ACCOUNT);
    }
}
