<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_login()
    {
        // get user
        $user = User::first();

        // make requests for login
        $response = $this->post('/api/login', [
            User::EMAIL => $user->email,
            User::PASSWORD => 'password'
        ], [
            "Accept"=>"application/json"
        ]);

        //check status
        $response->assertStatus(200);
    }

    public function test_user_unsuccessful_login()
    {
        // get user
        $user = User::first();

        // change password & make request
        $response = $this->post('/api/login', [
            User::EMAIL => $user->email,
            User::PASSWORD => 'password123'
        ], [
            "Accept"=>"application/json"
        ]);

        // check status
        $response->assertStatus(401);
    }

    public function test_logged_user_profile()
    {
        // get user
        $user = User::first();

        // generate token
        $token = $user->createToken('auth_token')->plainTextToken;

        // make request
        $response = $this->post('/api/me', [], [
            "Authorization" => "Bearer " . $token,
            "Accept"=>"application/json"
        ]);

        // validate status
        $response->assertStatus(200);
    }

    public function test_user_registration()
    {
        // generate user
        $user = User::factory(1)->make()->first();

        // make request
        $response = $this->post('/api/register', [
            User::NAME => $user->name . "_automation_test",
            User::EMAIL => $user->email,
            User::PASSWORD => "password"
        ], [
            "Accept"=>"application/json"
        ]);

        // check status
        $response->assertStatus(200);
    }

    public function test_user_unsuccessful_registration()
    {
        // get user
        $user = User::first();

        // meke request
        $response = $this->post('/api/register', [
            User::EMAIL => $user->email,
            User::PASSWORD => "password"
        ], [
            "Accept"=>"application/json"
        ]);

        // check status
        $response->assertStatus(422);
    }
}
