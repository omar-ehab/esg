<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $jobs = [
            'Operations & Logistics',
            'Agency & Suez Canal Transit',
            'Customer Service & Documentation',
            'Commercial',
            'Business Development',
            'Marketing',
            'Finance & Accounting',
            'IT',
            'HR',
            'Admin',
            'Legal'
        ];
        foreach ($jobs as $job) {
            Job::create(['name' => $job]);
        }
    }
}
