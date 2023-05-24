<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserData;

class UserDataTableSeeder extends Seeder
{
    public function run()
    {
        UserData::factory()->count(10)->create();
    }
}
