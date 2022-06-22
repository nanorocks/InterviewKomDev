<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectsTest extends TestCase
{

    public function test_store_project_to_db_by_user()
    {
        // get user
        $user = User::first();

        // create token
        $token = $user->createToken('auth_token')->plainTextToken;

        // generate project
        $project = Project::factory(1)->make()->first();

        // make request with auth headers
        $response = $this->post('/api/projects', $project->toArray(), [
            "Authorization" => "Bearer " . $token,
            "Accept"=>"application/json"
        ]);

        // return dd($response->json());
        // check status
        $response->assertStatus(201);
    }

    public function test_load_collection_of_projects()
    {
        // get user
        $user = User::first();

        // create token
        $token = $user->createToken('auth_token')->plainTextToken;

        // make request with auth headers
        $response = $this->get('/api/projects', [
            "Authorization" => "Bearer " . $token,
            "Accept"=>"application/json"
        ]);

        // check status
        $response->assertStatus(200);
    }
}
