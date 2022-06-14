<?php

namespace Database\Factories;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Factories\Factory;

class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            Todo::DESCRIPTION => $this->faker->text(),
            Todo::IS_DONE => $this->faker->boolean(),
            Todo::STATUS => $this->faker->boolean(),
            Todo::TRACK_COUNTER => $this->faker->numberBetween(0, 10),
        ];
    }
}
