<?php

namespace Database\Factories;
use App\Models\Organizer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Board>
 */
class BoardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $organizer = Organizer::all()->random()->id;
        return [
            'organizer_id' => $organizer,
            'header' => $this->faker->realTextBetween(5, 10)
        ];
        
    }
}
