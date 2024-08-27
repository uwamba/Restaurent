<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consumable>
 */
class ConsumableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'name' => fake()->product(),
            'category_id' => fake()->number(),
            'subcategory_id' => fake()->random_int(),
            'descriptions' => fake()->description(),
            'maximum_items' => fake()->random_int(),
            'minimum_item' => fake()->random_int(),
            'expiration_date' => now(),
            'unit' => fake()->unit(),


        ];
    }
}
