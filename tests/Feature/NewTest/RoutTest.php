<?php

namespace Tests\Feature\NewTest;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\Profile;
use App\Models\User;
use App\Services\UploadService;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\File\UploadedFile as FileUploadedFile;
use Tests\TestCase;

class test extends TestCase
{


    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_info () {
        $response = $this->get('/');
        $response->assertOk();
    }
    public function test_acount_index_controller(){
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('account'));
        $response->assertOk();
    }
    public function test_acount_profile_controller_index(){
        $user = User::factory()->create();
        $_GET = ['profile' => 14];
        $response = $this->actingAs($user)->get(route('account.profiles.index', $_GET));
        $response->assertOk();

    }

    public function test_acount_profile_controller_create(){
        $user = User::factory()->create();
        $_GET = ['profile' => 14];
        $response = $this->actingAs($user)->get(route('account.profiles.create', $_GET));
        $response->assertOk();
    }
    // public function test_acount_profile_controller_store(){
    //     $user = User::factory()->create();


    //     $_GET = ['user_id' => 14];

    //     $dile = FileUploadedFile::;
    //     $req = [
    //     "first_name" => "123123123",
    //     "last_name" => "123123123",
    //     "father_name" => "123123123123",
    //     "age" => "23",
    //     "gender" => "male",
    //     "image" => $file
    // ];


    //     $response = $this->actingAs($user)->post(route('account.profiles.store',$req , $_GET));
    //     $response->assertOk();
    // }
    public function test_acount_profile_controller_edit(){
        $user = User::factory()->create();
        $_GET=['profile' => 14];
        $response = $this->actingAs($user)->get(route('account.profiles.create',$_GET));
        $response->assertOk();
    }
    public function test_acount_users_controller_index(){
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('account.users.index'));
        $response->assertOk();
    }
    // public function test_acount_users_controller_store(){
    //     $user = User::factory()->create();
    //     $req = [
    //     "first_name" => "123123123",
    //     "last_name" => "123123123",
    //     "father_name" => "123123123123",
    //     "age" => "23",
    //     "gender" => "male",
    // ];
    //     $response = $this->actingAs($user)->post(route('account.users.store', $req, $_GET));
    //     $response->assertOk();
    // }
public function test_acount_users_controller_create(){
        $user = User::factory()->create();
        $user->role = 'IS_ADMIN';
        // dd($user);
        $response = $this->actingAs($user)->get(route('account.users.create', $_GET));
        $response->assertOk();
    }
public function test_acount_users_controller_show(){
            $user = User::factory()->create();
            $_GET=['user' => 14];
            // $user->role = 'IS_ADMIN';
            $response = $this->actingAs($user)->get(route('account.users.show', $_GET));
            $response->assertOk();
        }
public function test_acount_users_controller_edit(){
            $user = User::factory()->create();
            $_GET=['user' => 14];
            // $user->role = 'IS_ADMIN';
            $response = $this->actingAs($user)->get(route('account.users.edit', $_GET));
            $response->assertOk();
        }
public function test_admin_index_controller(){
            $user = User::factory()->create();
            $_GET=['user' => 14];
            $user->role = 'IS_ADMIN';
            $response = $this->actingAs($user)->get(route('admin.index', $_GET));
            $response->assertOk();
        }
public function test_admin_profiles_controller_index(){
            $user = User::factory()->create();
            $_GET=['user' => 14];
            $user->role = 'IS_ADMIN';
            $response = $this->actingAs($user)->get(route('admin.profiles.index', $_GET));
            $response->assertOk();
        }
public function test_admin_profiles_controller_create(){
            $user = User::factory()->create();
            $_GET=['user' => 14];
            $user->role = 'IS_ADMIN';
            $response = $this->actingAs($user)->get(route('admin.profiles.create', $_GET));
            $response->assertOk();
        }
public function test_admin_profiles_controller_show(){
            $user = User::factory()->create();
            $_GET=['profile' => 14];
            $user->role = 'IS_ADMIN';
            $response = $this->actingAs($user)->get(route('admin.profiles.show', $_GET));
            $response->assertOk();
        }
// public function test_admin_profiles_controller_edit(){
//             $user = User::factory()->create();
//             $_GET=['profile' => 8];
//             $user->role = 'IS_ADMIN';
//             // $this->withoutMiddleware();
//             $response = $this->actingAs($user)->get(route('admin.profiles.edit', $_GET));
//             $response->assertOk();
//         }
public function test_admin_relation_controller_index(){
            $user = User::factory()->create();
            $user->role = 'IS_ADMIN';
            $response = $this->actingAs($user)->get(route('admin.relations.index'));
            $response->assertOk();
        }
public function test_admin_relation_controller_create(){
            $user = User::factory()->create();
            $user->role = 'IS_ADMIN';
            $response = $this->actingAs($user)->get(route('admin.relations.create'));
            $response->assertOk();
        }
public function test_admin_relation_controller_show(){
            $user = User::factory()->create();
            $_GET=['profile' => 14];
            $user->role = 'IS_ADMIN';
            $response = $this->actingAs($user)->get(route('admin.relations.create', $_GET));
            $response->assertOk();
        }
public function test_admin_relation_controller_edit(){
            $user = User::factory()->create();
            $_GET=['trainer' => 14];
            $user->role = 'IS_ADMIN';
            $response = $this->actingAs($user)->get(route('admin.relations.edit', $_GET));
            $response->assertOk();
        }
public function test_admin_skill_controller_index(){
            $user = User::factory()->create();
            $user->role = 'IS_ADMIN';
            $response = $this->actingAs($user)->get(route('admin.skills.index'));
            $response->assertOk();
        }
}
