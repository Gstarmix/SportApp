<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            UserDataTableSeeder::class,
            SuscriptionsTableSeeder::class,
            CoursesTableSeeder::class,
            CategoriesTableSeeder::class,
            TarifsTableSeeder::class,
            TutorsTableSeeder::class,
        ]);
    }
}