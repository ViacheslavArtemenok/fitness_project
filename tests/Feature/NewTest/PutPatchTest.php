<?php

namespace Tests\Feature\NewTest;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class PutPatchTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // // PUT|PATCH       account/profiles/{profile} account.profiles.update › Accoun…
    // public function test_account_profiles_controller_update(){
    //     $user = User::factory()->create();
    //     // $user->role = 'IS_ADMIN';
    //     $deliteObjects = Profile::latest()->take(1)->get();
    //     foreach ($deliteObjects as $deliteObject) {
    //         $_POST = ['profile' => $deliteObject->id,
    //         'user_id' => 1,
    //         'first_name' => 'Admin',
    //         'last_name' => 'Admins',
    //         'father_name' => 'Admin',
    //         'age' => 99,
    //         'gender' => 'male',
    //         'image' => UploadedFile::fake()->create('222222.jpg')];
    //         $deliteObject->first_name = '111111';
    //         // dd($deliteObject);
    //                 }
    //     // $deliteObject->deleted_at = now('Europe/Moscow');
    //     $response = $this->actingAs($user)->put(route('account.profiles.update',$_POST));
    //     // dd($response);
    //     $response->assertRedirect('account/profiles');
    // }

    public function test_account_profiles_controller_update(){
        $user = User::factory()->create();
        // $user->role = 'IS_ADMIN';
        $deliteObjects = Profile::latest()->take(1)->get();
        foreach ($deliteObjects as $deliteObject) {
            $_POST = ['profile' => $deliteObject->id,
            'user_id' => 1,
            'first_name' => 'Admin',
            'last_name' => 'Admins',
            'father_name' => 'Admin',
            'age' => 99,
            'gender' => 'male',
            'image' => UploadedFile::fake()->create('222222.jpg')];
            $deliteObject->first_name = '111111';
            // dd($deliteObject);
                    }
        // $deliteObject->deleted_at = now('Europe/Moscow');
        $response = $this->actingAs($user)->put(route('account.profiles.update',$_POST));
        // dd($response);
        $response->assertRedirect('account/profiles');
    }
}
