<?php

namespace Tests\Feature\NewTest;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class test extends TestCase
{


    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function test_acount_index_controller(){
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('account'));
        $response->assertOk();
    }
    public function test_acount_profile_controller_index(){
        $user = User::factory()->create();
        $response = $this->get(route('account.profiles.index'));
        $response->assertRedirect();

    }
    public function test_acount_profile_controller_create(){
        $response = $this->get(route('account.profiles.create'));
        $response->assertRedirect();
    }
    public function test_acount_profile_controller_store(){
        $user = User::factory()->create();
        $_GET = ['profile' => 14];
        $response = $this->actingAs($user)->get(route('account.profiles.store', $_GET));
        $response->assertOk();
    }
    public function test_acount_profile_controller_edit(){
        $user = User::factory()->create();

        $_GET=[
            'profile' => 14
        ];

        $response = $this->actingAs($user)->get(route('account.profiles.create',$_GET));
        $response->assertOk();
    }
}
