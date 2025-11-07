<?php

namespace Database\Factories;

use Brick\Math\BigInteger;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Competition>
 */
class CompetitionFactory extends Factory
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
            'year' => fake()->year(),
            'available_languages' => fake()->country(),
            'point_for_good_answer' => fake()->numberBetween(3,5),
            'point_for_bad_answer' => fake()->numberBetween(-2, -1),
            'point_for_no_answer' => 0 
        ];
    }
}
