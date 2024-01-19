<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\User;
use Domains\Interaction\Enums\InteractionType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Interaction>
 */
class InteractionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => Arr::random(
                array:[
                    InteractionType::EMAIL,
                    InteractionType::PHONE,
                    InteractionType::MEETING,
                ]
                ),
                'content' => $this->faker->paragraphs(nb:3,asText:true),
                'user_id'=> User::factory(),
                'contact_id'=>Contact::factory()
        ];
    }
}
