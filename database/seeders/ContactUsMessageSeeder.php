<?php

namespace Database\Seeders;

use App\Models\ContactUsMessage;
use Illuminate\Database\Seeder;

class ContactUsMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ContactUsMessage::factory()->count(5_000)->create();
    }
}
