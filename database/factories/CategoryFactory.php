<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->words(3, true),
            'age_min' => $this->faker->numberBetween(10, 20),
            'age_max' => $this->faker->numberBetween(21, 30),
            'sport' => $this->faker->word(),
            'user_id' => User::factory(),
        ];
    }
}