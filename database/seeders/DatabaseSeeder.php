<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            AboutSeeder::class,
            JobSeeder::class,
            CountrySeeder::class,
            PageSeeder::class,
//            SubscriberSeeder::class,
//            ContactUsMessageSeeder::class,
        ]);
    }
}
