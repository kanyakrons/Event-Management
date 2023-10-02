<?php

namespace Database\Factories;

use App\Models\Board;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BoardDetail>
 */
class BoardDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'board_header_id' => fake()->numberBetween(1,3),
            'topic' => fake()->realTextBetween(5,10),
            'detail' => fake()->realTextBetween(5,10)
        ];
    }
}
