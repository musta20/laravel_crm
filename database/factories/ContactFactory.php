<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'uuid'=>fake()->uuid(),
            'title'=>fake()->title(),
            'first_name'=>fake()->firstName(),
            'last_name'=>fake()->lastName(),
            'middle_name'=>fake()->firstName(),
            'last_name'=>fake()->lastName(),
            'preferred_name'=>fake()->userName(),
            'email'=>fake()->safeEmail(),
            'phone'=>fake()->phoneNumber()
        ];
    }
}
