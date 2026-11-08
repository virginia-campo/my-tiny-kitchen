<?php

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Recipe>
 */
class RecipeFactory extends Factory
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
            'user_id'           => User::first()->id ?? User::factory(),
            'recipe_title'      => fake ()->words(3, true), // GENERA 3 PALABRAS, TRUE ES QUE GENERA UNA HORACIÓN Y NO UN ARRAY DE TRES PALABRAS
            'instructions'      => fake ()->paragraph(4),
            'cooking_time'      => fake ()->numberBetween(15, 90),
            'ww_smartpoints'    => fake ()->numberBetween(1, 12)
        ];
    }
}
