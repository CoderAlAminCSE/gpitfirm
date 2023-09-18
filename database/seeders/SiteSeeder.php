<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Site::create([
            "website_name" => "1naasongs.fun",
            "website_url" => "https://naasongs.fun/",
            "da" => 65,
            "pa" => 4,
            "dr" => 56,
            "traffic" => 140,
            "category" => '[{"value":"General"}]',
            "google_news" => true,
            "active" => true,
        ]);

        Site::create([
            "website_name" => "2naasongs.fun",
            "website_url" => "https://naasongs.fun/",
            "da" => 85,
            "pa" => 4,
            "dr" => 75,
            "traffic" => 180,
            "category" => '[{"value":"General"}]',
            "google_news" => true,
            "active" => true,
        ]);

        Site::create([
            "website_name" => "3naasongs.fun",
            "website_url" => "https://naasongs.fun/",
            "da" => 53,
            "pa" => 4,
            "dr" => 61,
            "traffic" => 160,
            "category" => '[{"value":"General"}]',
            "google_news" => true,
            "active" => true,
        ]);

        Site::create([
            "website_name" => "4naasongs.fun",
            "website_url" => "https://naasongs.fun/",
            "da" => 36,
            "pa" => 4,
            "dr" => 63,
            "traffic" => 190,
            "category" => '[{"value":"General"}]',
            "google_news" => true,
            "active" => true,
        ]);

        Site::create([
            "website_name" => "5naasongs.fun",
            "website_url" => "https://naasongs.fun/",
            "da" => 53,
            "pa" => 4,
            "dr" => 44,
            "traffic" => 140,
            "category" => '[{"value":"General"}]',
            "google_news" => true,
            "active" => true,
        ]);

        Site::create([
            "website_name" => "6naasongs.fun",
            "website_url" => "https://naasongs.fun/",
            "da" => 69,
            "pa" => 7,
            "dr" => 77,
            "traffic" => 150,
            "category" => '[{"value":"General"}]',
            "google_news" => true,
            "active" => true,
        ]);

        Site::create([
            "website_name" => "7naasongs.fun",
            "website_url" => "https://naasongs.fun/",
            "da" => 80,
            "pa" => 4,
            "dr" => 70,
            "traffic" => 130,
            "category" => '[{"value":"General"}]',
            "google_news" => true,
            "active" => true,
        ]);

        Site::create([
            "website_name" => "8naasongs.fun",
            "website_url" => "https://naasongs.fun/",
            "da" => 68,
            "pa" => 4,
            "dr" => 71,
            "traffic" => 175,
            "category" => '[{"value":"General"}]',
            "google_news" => true,
            "active" => true,
        ]);

        Site::create([
            "website_name" => "9naasongs.fun",
            "website_url" => "https://naasongs.fun/",
            "da" => 69,
            "pa" => 4,
            "dr" => 25,
            "traffic" => 110,
            "category" => '[{"value":"General"}]',
            "google_news" => true,
            "active" => true,
        ]);

        Site::create([
            "website_name" => "10naasongs.fun",
            "website_url" => "https://naasongs.fun/",
            "da" => 25,
            "pa" => 6,
            "dr" => 85,
            "traffic" => 145,
            "category" => '[{"value":"General"}]',
            "google_news" => true,
            "active" => true,
        ]);

        Site::create([
            "website_name" => "11naasongs.fun",
            "website_url" => "https://naasongs.fun/",
            "da" => 20,
            "pa" => 7,
            "dr" => 66,
            "traffic" => 170,
            "category" => '[{"value":"General"}]',
            "google_news" => true,
            "active" => true,
        ]);

        Site::create([
            "website_name" => "12naasongs.fun",
            "website_url" => "https://naasongs.fun/",
            "da" => 50,
            "pa" => 5,
            "dr" => 56,
            "traffic" => 180,
            "category" => '[{"value":"General"}]',
            "google_news" => true,
            "active" => true,
        ]);
    }
}
