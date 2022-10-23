<?php

namespace Tests\Feature\NewTest;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get(route('account.profiles.create'));

        $response->assertRedirect();
    }

    public function test_acount_index_controller(){
        $response = $this->get(route('account'));
        $response->assertRedirect();
    }
    public function test_acount_profile_controller_index(){
        $response = $this->get(route('account.profiles.index'));
        $response->assertRedirect();

    }
    public function test_acount_profile_controller_create(){
        $response = $this->get(route('account.profiles.create'));
        $response->assertRedirect();
    }
}
