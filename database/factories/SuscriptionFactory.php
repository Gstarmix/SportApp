<?php

namespace Database\Factories;

use App\Models\Suscription;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuscriptionFactory extends Factory
{
    protected $model = Suscription::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'license' => $this->faker->numerify('####'),
            'accepted' => $this->faker->boolean(),
            'member' => $this->faker->numberBetween(1, 100),
            'total_price' => $this->faker->randomFloat(2, 1, 1000),
            'payed' => $this->faker->randomFloat(2, 1, 1000),
        ];
    }
}