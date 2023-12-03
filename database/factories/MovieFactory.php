<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\section;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use function Laravel\Prompts\text;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name,
            'minute'=>rand(10,120),
            'description'=>fake()->text,
            'category_id'=>Category::factory(),
        ];
    }
}
