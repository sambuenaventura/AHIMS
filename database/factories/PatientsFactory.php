<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PatientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'date_of_birth' => fake()->date('Y-m-d'), // Generates a date of birth in the format '1997-06-08'
            'gender' => fake()->randomElement(['Male', 'Female']),
            'contact_number' => '09' . fake()->numerify('#########'), // Generates a random contact number starting with '09'
            'address' => fake()->address(),
            'pic_first_name' => fake()->firstName(),
            'pic_last_name' => fake()->lastName(),
            'pic_relation' => fake()->randomElement(['Father', 'Mother', 'Sister', 'Brother', 'Friend', 'Wife', 'Husband']), // Generates a random relation
            'pic_contact_number' => '09' . fake()->numerify('#########'), // Generates a random contact number starting with '09'
            'ap_first_name' => fake()->firstName(),
            'ap_last_name' => fake()->lastName(),
            'ap_contact_number' => '09' . fake()->numerify('#########'), // Generates a random contact number starting with '09'
            // 'room_number' => 'For ER',
            // 'specialist' => fake()->name(), // Generates a random name
            'admission_type' => fake()->randomElement(['Inpatient', 'Outpatient']), // Generates a random admission type
        ];
        
    }
}
