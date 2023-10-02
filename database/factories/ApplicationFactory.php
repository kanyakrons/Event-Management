<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'user_id' => fake()->numberBetween(1, User::count()),
            'event_id' => fake()->numberBetween(1, Event::count()),
            'status' => fake()->randomElement(['WAITING', 'ACCEPT','REJECT']),
        ];
    }
}
