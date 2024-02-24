<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PhysiciansFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'phy_first_name' => fake()->firstName,
        'phy_last_name' => fake()->lastName,
        'specialty' => fake()->randomElement(['Internal_Medicine', 
                                                'Gastroenterology', 
                                                'Neurology', 
                                                'Cardiology', 
                                                'Pulmonology', 
                                                'Pediatrics', 
                                                'Endocrinology', 
                                                'Otolaryngology',]),
        'phy_contact_number' => '09' . fake()->numerify('#########'), // Generate 11-digit number starting with '09'

        ];
    }
}
// 'first_name' => fake()->firstName(),
// 'last_name' => fake()->lastName(),
// 'age' => fake()->numberBetween($min = 1, $max = 100),
// 'gender' => fake()->randomElement(['Male','Female']),
// 'contact_number' => fake()->e164PhoneNumber(),
// 'address' => fake()->address(),