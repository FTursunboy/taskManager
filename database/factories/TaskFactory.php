<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'name' => $this->faker->name(),
            'status' => $this->faker->word(),
            'date' => $this->faker->word(),
            'description' => $this->faker->text(),
            'user_id' => $this->faker->word(),
        ];
    }
}
