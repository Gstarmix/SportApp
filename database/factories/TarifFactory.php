<?php

namespace Database\Factories;

use App\Models\Tarif;
use Illuminate\Database\Eloquent\Factories\Factory;

class TarifFactory extends Factory
{
    protected $model = Tarif::class;

    public function definition()
    {
        return [
            'obligatoire' => $this->faker->boolean(),
            'nom' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 1, 1000),
        ];
    }
}