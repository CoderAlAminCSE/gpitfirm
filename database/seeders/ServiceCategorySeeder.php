<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            "name" => "Guest Post",
            "slug" => "guest-post",
            "active" => true,
        ]);

        Category::create([
            "name" => "Link Building",
            "slug" => "link-building",
            "active" => true,
        ]);
    }
}
