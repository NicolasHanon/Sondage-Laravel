<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\sondages>
 */
class SondageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'SON_TITRE' => fake()->text(10),
            'SON_DATE' => fake()->date(10),
            'SON_DESCRIPTION' => fake()->text(50),
        ];
    }
}
