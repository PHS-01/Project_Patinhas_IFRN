<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => $this->faker->imageUrl,
            'name' => $this->faker->firstName,
            'age' => $this->faker->numberBetween(1, 15), 
            'breed' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'health_status' => $this->faker->sentence,
            'size' => $this->faker->randomElement(['Small', 'Medium', 'Large']),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'available_for_adoption' => $this->faker->randomElement(['true', 'false']),
        ];
    }
}
