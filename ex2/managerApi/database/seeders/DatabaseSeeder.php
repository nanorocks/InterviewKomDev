<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)
            ->create()
            ->each(function ($user) {
                $user->projects()->saveMany(
                    Project::factory(rand(1,5))->create()->each(function ($project) use ($user) {
                        Todo::factory(3)->create([
                            Project::RELATION_PROJECT_ID => $project->id,
                            User::RELATION_USER_ID => $user->id
                        ]);
                    })
                );
        });
    }
}
