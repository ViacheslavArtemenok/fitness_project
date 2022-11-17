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
    public function test_example()
    {
        $users = User::all();
        foreach ($users as $user) {
            // dd($user);
            $this->assertDatabaseHas('users', [
                'email' => $user->email,
            ]);

        }

    }
    public function test_example2()
    {
        $profiles = Profile::all();
        foreach ($profiles as $profile) {
            $users = $profile->user()->get();
            foreach ($users as $user){
                $this->assertDatabaseHas('users', [
                    'id' => $profile->user_id,
                    'email' => $user->email,
                ]);
            }


        }

    }
}
