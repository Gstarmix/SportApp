<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Suscription;
use App\Models\Tarif;

class SuscriptionsTableSeeder extends Seeder
{
    /**
     * Run the seeder.
     */
    public function run()
    {
        Suscription::factory()->count(10)->create()->each(function ($suscription) {
            $tarifs = Tarif::inRandomOrder()->limit(3)->get();
            $suscription->tarifs()->attach($tarifs);
        });
    }
}