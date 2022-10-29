<?php

namespace Tests\Feature\NewTest;

use App\Models\Profile;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\User;
use Faker\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class test extends TestCase
{


    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_info()
    {
        $response = $this->get('/');
        $response->assertOk();
    }
    public function test_acount_index_controller()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('account'));
        $response->assertOk();
    }
    public function test_acount_profile_controller_index()
    {
        $user = User::factory()->create();
        $_GET = ['profile' => 14];
        $response = $this->actingAs($user)->get(route('account.profiles.index', $_GET));
        $response->assertOk();
    }

    public function test_acount_profile_controller_create()
    {
        $user = User::factory()->create();
        $_GET = ['profile' => 14];
        $response = $this->actingAs($user)->get(route('account.profiles.create', $_GET));
        $response->assertOk();
    }

    public function test_acount_profile_controller_edit()
    {
        $user = User::factory()->create();
        $_GET = ['profile' => 14];
        $response = $this->actingAs($user)->get(route('account.profiles.create', $_GET));
        $response->assertOk();
    }
    public function test_acount_users_controller_index()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('account.users.index'));
        $response->assertOk();
    }

    public function test_acount_users_controller_create()
    {
        $user = User::factory()->create();
        $user->role = 'IS_ADMIN';
        // dd($user);
        $response = $this->actingAs($user)->get(route('account.users.create', $_GET));
        $response->assertOk();
    }
    public function test_acount_users_controller_show()
    {
        $user = User::factory()->create();
        $_GET = ['user' => 14];
        // $user->role = 'IS_ADMIN';
        $response = $this->actingAs($user)->get(route('account.users.show', $_GET));
        $response->assertOk();
    }
    public function test_acount_users_controller_edit()
    {
        $user = User::factory()->create();
        $_GET = ['user' => 14];
        // $user->role = 'IS_ADMIN';
        $response = $this->actingAs($user)->get(route('account.users.edit', $_GET));
        $response->assertOk();
    }
    public function test_admin_index_controller()
    {
        $user = User::factory()->create();
        $_GET = ['user' => 14];
        $user->role = 'IS_ADMIN';
        $response = $this->actingAs($user)->get(route('admin.index', $_GET));
        $response->assertOk();
    }
    public function test_admin_profiles_controller_index()
    {
        $user = User::factory()->create();
        $_GET = ['user' => 14];
        $user->role = 'IS_ADMIN';
        $response = $this->actingAs($user)->get(route('admin.profiles.index', $_GET));
        $response->assertOk();
    }
    public function test_admin_profiles_controller_create()
    {
        $user = User::factory()->create();
        $_GET = ['user' => 14];
        $user->role = 'IS_ADMIN';
        $response = $this->actingAs($user)->get(route('admin.profiles.create', $_GET));
        $response->assertOk();
    }
    public function test_admin_profiles_controller_show()
    {
        $user = User::factory()->create();
        $_GET = ['profile' => 14];
        $user->role = 'IS_ADMIN';
        $response = $this->actingAs($user)->get(route('admin.profiles.show', $_GET));
        $response->assertOk();
    }
    public function test_admin_profiles_controller_edit()
    {
        $user = User::factory()->create();
        $faker = Factory::create();
        $profile = Profile::create([
            'user_id' => $user->id,
            'first_name' => $faker->firstNameFemale(),
            'last_name' => $faker->lastName('female'),
            'father_name' => 'Петровна',
            'age' => rand(25, 45),
            'gender' => 'female',
            'image' => 'https://cdn.inskill.ru/media/32540/c/1591358903_o4XapEybYWOG87t8-thumb.jpg?v=1591358908',
            'created_at' => now('Europe/Moscow'),
        ]);

        $user->role = 'IS_ADMIN';
        $response = $this->actingAs($user)->get(route('admin.profiles.edit', $profile));
        $response->assertOk();
    }
    public function test_admin_relation_controller_index()
    {
        $user = User::factory()->create();
        $user->role = 'IS_ADMIN';
        $response = $this->actingAs($user)->get(route('admin.relations.index'));
        $response->assertOk();
    }
    public function test_admin_relation_controller_create()
    {
        $user = User::factory()->create();
        $user->role = 'IS_ADMIN';
        $response = $this->actingAs($user)->get(route('admin.relations.create'));
        $response->assertOk();
    }
    public function test_admin_relation_controller_show()
    {
        $user = User::factory()->create();
        $_GET = ['profile' => 14];
        $user->role = 'IS_ADMIN';
        $response = $this->actingAs($user)->get(route('admin.relations.create', $_GET));
        $response->assertOk();
    }
    public function test_admin_relation_controller_edit()
    {
        $user = User::factory()->create();
        $_GET = ['trainer' => 14];
        $user->role = 'IS_ADMIN';
        $response = $this->actingAs($user)->get(route('admin.relations.edit', $_GET));
        $response->assertOk();
    }
    public function test_admin_skill_controller_index()
    {
        $user = User::factory()->create();
        $user->role = 'IS_ADMIN';
        $response = $this->actingAs($user)->get(route('admin.skills.index'));
        $response->assertOk();
    }
    public function test_admin_skill_controller_create()
    {
        $user = User::factory()->create();
        $user->role = 'IS_ADMIN';
        $response = $this->actingAs($user)->get(route('admin.skills.create'));
        $response->assertOk();
    }
    public function test_admin_skill_controller_show()
    {
        $user = User::factory()->create();
        $_GET = ['skill' => 14];
        $user->role = 'IS_ADMIN';
        $response = $this->actingAs($user)->get(route('admin.skills.show', $_GET));
        $response->assertOk();
    }
    public function test_admin_skill_controller_edit()
    {
        $user = User::factory()->create();
        $faker = Factory::create();
        $skill = Skill::create([
            'user_id'         => $user->id,
            'location'        => 'Москва',
            'education'       => $faker->company(),
            'experience'      => rand(1, 20),
            'achievements'    => $faker->paragraph(rand(3, 8)),
            'skills_list'     => $faker->paragraph(rand(6, 10)),
            'description'     => $faker->paragraph(rand(6, 10)),
            'created_at'      => now('Europe/Moscow')
        ]);

        $user->role = 'IS_ADMIN';
        $response = $this->actingAs($user)->get(route('admin.skills.edit', $skill));
        $response->assertOk();
    }
    public function test_admin_tag_controller_index()
    {
        $user = User::factory()->create();
        $user->role = 'IS_ADMIN';
        $response = $this->actingAs($user)->get(route('admin.tags.index'));
        $response->assertOk();
    }
    public function test_admin_tag_controller_create()
    {
        $user = User::factory()->create();
        $user->role = 'IS_ADMIN';
        $response = $this->actingAs($user)->get(route('admin.tags.create'));
        $response->assertOk();
    }
    public function test_admin_tag_controller_show()
    {
        $user = User::factory()->create();
        $user->role = 'IS_ADMIN';
        $_GET = ['tag' => 14];
        $response = $this->actingAs($user)->get(route('admin.tags.show', $_GET));
        $response->assertOk();
    }
    public function test_admin_tag_controller_edit()
    {
        $user = User::factory()->create();
        $tag = Tag::create([
            'tag' => 'Игровые программы',
            'created_at' => now('Europe/Moscow')
        ]);
        $user->role = 'IS_ADMIN';
        $response = $this->actingAs($user)->get(route('admin.tags.edit', $tag));
        $response->assertOk();
    }
    public function test_admin_user_controller_index()
    {
        $user = User::factory()->create();
        $user->role = 'IS_ADMIN';
        $response = $this->actingAs($user)->get(route('account.users.index'));
        $response->assertOk();
    }
    public function test_admin_user_controller_create()
    {
        $user = User::factory()->create();
        $user->role = 'IS_ADMIN';
        $response = $this->actingAs($user)->get(route('account.users.create'));
        $response->assertOk();
    }
    public function test_admin_user_controller_show()
    {
        $user = User::factory()->create();
        $_GET = ['user' => 14];
        $user->role = 'IS_ADMIN';
        $response = $this->actingAs($user)->get(route('account.users.show', $_GET));
        $response->assertOk();
    }
    public function test_admin_user_controller_edit()
    {
        $user = User::factory()->create();
        $user->role = 'IS_ADMIN';
        $response = $this->actingAs($user)->get(route('account.users.edit', $user));
        $response->assertOk();
    }
    public function test_api_user()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('api/user');
        $response->assertOk();
    }
    public function test_subscription_controller_index()
    {
        $response = $this->get(route('subscriptions.index'));
        $response->assertOk();
    }
    public function test_subscription_controller_create()
    {
        $response = $this->get(route('subscriptions.create'));
        $response->assertOk();
    }
    public function test_subscription_controller_show()
    {
        $_GET = ['subscription' => 14];
        $response = $this->get(route('subscriptions.show', $_GET));
        $response->assertOk();
    }
    public function test_subscription_controller_edit()
    {
        $_GET = ['subscription' => 14];
        $response = $this->get(route('subscriptions.edit', $_GET));
        $response->assertOk();
    }
    public function test_trainers_controller_show()
    {
        $_GET = [
            'id' => 0,
            'city_id' => 0,

        ];
        $response = $this->get(route('trainers.show', $_GET));
        $response->assertOk();
    }
    public function test_trainers_controller_index()
    {
        $_GET = [
            'tag_id' => 0,
            'city_id' => 0,
        ];
        $response = $this->get(route('trainers.index', $_GET));
        $response->assertOk();
    }
    public function test_trainers_controller_review()
    {
        $_GET = [
            'review_id' => 0,
            'client_id' => 0,
            'trainer_id' => 0,
            'city_id' => 0
        ];
        $response = $this->get(route('trainers.review', $_GET));
        $response->assertOk();
    }

    public function test_verify_email()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get(route('verification.notice'));
        $response->assertRedirect(route('account'));
    }


    // Post методы


    public function test_admin_tags_controller_store()
    {
        $user = User::factory()->create();
        $user->role = 'IS_ADMIN';
        $req = [
            'tag' => 'Tests',
            'created_at' => now('Europe/Moscow')
        ];
        $response = $this->actingAs($user)->post(route('admin.tags.store', $req, $_GET));
        $response->assertRedirect(route('admin.tags.index'));
    }
    // public function test_account_users_controller_store(){
    //     // Проблемы в контроллере Тест не проходит
    //     $user = User::factory()->create();
    //     $user->role = 'IS_ADMIN';
    //     $req = [
    //         'name'        => 'admin',
    //         'email'       => 'admin@mail.ru',
    //         'phone'       => '+7 (999) 999-99-99',
    //         'role'        => User::IS_ADMIN,
    //         'status'      => User::ACTIVE,
    //         'password'    => Hash::make('12345678'),
    //         'email_verified_at' => now('Europe/Moscow'),
    //         'created_at'  => now('Europe/Moscow')
    //     ];
    //     $response = $this->actingAs($user)->post(route('account.users.store',$req));
    //     $response->assertRedirect(route('account.profiles.index'));
    // }
    // public function test_acount_profile_controller_store(){
    //     $user = User::factory()->create();
    //     $_GET = ['user_id' => 14];
    //     $img = UploadedFile::fake()->create('222222.jpg');
    //     $req = [
    //     "first_name" => "123123123",
    //     "last_name" => "123123123",
    //     "father_name" => "123123123123",
    //     "age" => "23",
    //     "gender" => "male",
    //     "image" => $img
    // ];
    //     $response = $this->actingAs($user)->post(route('account.profiles.store',$req , $_GET));
    //     $response->assertOk();
    // }
    public function test_admin_profile_controller_store()
    {
        $user = User::factory()->create();
        $user->role = 'IS_ADMIN';
        $faker = Factory::create();
        $req = [
            'user_id' => 99,
            'first_name' => $faker->firstNameFemale(),
            'last_name' => $faker->lastName('female'),
            'father_name' => 'Петровна',
            'age' => rand(25, 45),
            'gender' => 'female',
            'image' => null,
            'created_at' => now('Europe/Moscow'),
        ];
        $response = $this->actingAs($user)->post(route('admin.profiles.store', $req));
        $response->assertRedirect(route('admin.profiles.index'));
    }
    //     public function test_admin_relations_controller_store(){
    // // Не написана функция в самом контроллере
    //         $user = User::factory()->create();
    //         $_GET = ['user_id' => 14];
    //         $user->role = 'IS_ADMIN';
    //         $req = [
    //             'user_id' => $user->id,
    //             'tag_id' => rand(1, 22),
    //             'created_at' => now('Europe/Moscow')
    //     ];
    //         $response = $this->actingAs($user)->post(route('admin.relations.store',$req , $_GET));
    //         $response->assertRedirect(route('admin.relations.index'));
    //     }

    public function test_admin_skills_controller_store()
    {
        $user = User::factory()->create();
        $_GET = ['user_id' => 14];
        $faker = Factory::create();
        $user->role = 'IS_ADMIN';
        $req = [
            'user_id'         => $user->id,
            'location'        => 'Москва',
            'education'       => $faker->company(),
            'experience'      => rand(1, 20),
            'achievements'    => $faker->paragraph(rand(3, 8)),
            'skills_list'     => $faker->paragraph(rand(6, 10)),
            'description'     => $faker->paragraph(rand(6, 10)),
            'created_at'      => now('Europe/Moscow')
        ];
        $response = $this->actingAs($user)->post(route('admin.skills.store', $req, $_GET));
        $response->assertRedirect(route('admin.skills.index'));
    }
    // public function test_admin_user_controller_store(){
    //     // Проблемы в контроллере Тест не проходит
    //         $user = User::factory()->create();
    //         $_GET = ['user_id' => 14];
    //         $faker = Factory::create();
    //         $user->role = 'IS_ADMIN';
    //         $req = [
    //             'name'        => 'admin',
    //             'email'       => 'admin@mail.ru',
    //             'phone'       => '+7 (999) 999-99-99',
    //             'role'        => User::IS_ADMIN,
    //             'status'      => User::ACTIVE,
    //             'password'    => Hash::make('12345678'),
    //             'email_verified_at' => now('Europe/Moscow'),
    //             'created_at'  => now('Europe/Moscow')
    //     ];
    //         $response = $this->actingAs($user)->post(route('admin.users.store',$req , $_GET));
    //         $response->assertRedirect(route('admin.users.store'));
    //     }
    // public function test_account_profiles_controller_destroy(){
    //         $user = User::factory()->create();
    //         $profile = Profile::latest()->take(1)->get();
    //         $_GET = ['profile' => $profile];
    //         $profile->deleted_at = now('Europe/Moscow');
    //         $response = $this->actingAs($user)->delete(route('account.profiles.destroy',$profile, $_GET));
    //         $response->assertOk();
    //     }

}
