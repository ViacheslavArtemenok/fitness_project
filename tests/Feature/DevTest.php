<?php

namespace Tests\Feature;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DevTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // GET|HEAD        gym/review/{review_id}/{client_id}/{gym_id}/{city_id} .......................... gyms.review › GymController@review
    public function test_gym_controller_review()
    {
        $user = User::factory()->create();
        $_GET = [
            'review_id' => 1,
            'client_id' => 1,
            'gym_id' => 1,
            'city_id' => 1
        ];
        $response = $this->actingAs($user)->get(route('gyms.review', $_GET));
        $response->assertOk();
    }
}
