<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodosTest extends TestCase
{

    public function test_store_todo_to_db()
    {
        // get user
        $user = User::first();

        // generate token
        $token = $user->createToken('auth_token')->plainTextToken;

        // get project
        $project = Project::first();


        $response = $this->post('/api/todos', [
            Todo::DESCRIPTION => "test-decription",
            Project::RELATION_PROJECT_ID => $project->id
        ], [
            "Authorization" => "Bearer " . $token,
            "Accept" => "application/json"
        ]);

        // check status
        $response->assertStatus(201);
    }

    public function test_single_todo_and_count_visits()
    {
        // get user
        $user = User::first();

        // create token
        $token = $user->createToken('auth_token')->plainTextToken;

        // get id for todo
        $todo = Todo::firstOrFail();

        // make request with auth headers
        $response = $this->get('/api/todos/' . $todo->id, [
            "Authorization" => "Bearer " . $token,
            "Accept" => "application/json"
        ]);

        // check status
        $response->assertStatus(200);
    }

    public function test_check_single_todo_is_done()
    {
        // get user
        $user = User::first();

        // create token
        $token = $user->createToken('auth_token')->plainTextToken;

        // get id for todo
        $todo = Todo::first();

        // make request with auth headers
        $response = $this->put('/api/todos/' . $todo->id .  '/isDone', [], [
            "Authorization" => "Bearer " . $token,
            "Accept" => "application/json"
        ]);

        // check status
        $response->assertStatus(200);
    }

    public function test_load_collection_of_todos()
    {
        // get user
        $user = User::first();

        // create token
        $token = $user->createToken('auth_token')->plainTextToken;

        // make request with auth headers
        $response = $this->get('/api/todos', [
            "Authorization" => "Bearer " . $token,
            "Accept" => "application/json"
        ]);

        // check status
        $response->assertStatus(200);
    }

    public function test_delete_single_todo()
    {
        // get user
        $user = User::first();

        // create token
        $token = $user->createToken('auth_token')->plainTextToken;

        // get id for todo
        $todo = Todo::first();

        // make request with auth headers
        $response = $this->delete('/api/todos/' . $todo->id, [], [
            "Authorization" => "Bearer " . $token,
            "Accept" => "application/json"
        ]);

        // check status
        $response->assertStatus(200);
    }
}
