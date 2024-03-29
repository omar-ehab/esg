<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $pages = ['About Us',
            'Search',
            'Career',
            'Contact Us',
            'Home',
            'News',
            'Ports',
            'MaritimeLaw',
            'Equipment',
            'Our Offices',
            'Suez Canal',
            'About Suez Canal',
            'Suez Canal Convoy'
        ];

        foreach ($pages as $page) {
            $slug = Str::slug($page);
            Page::create([
                'name' => $page,
                'slug' => $slug,
                'url' => url('/' . $slug)
            ]);
        }
    }
}
