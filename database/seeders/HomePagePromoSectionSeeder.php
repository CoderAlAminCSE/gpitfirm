<?php

namespace Database\Seeders;

use App\Models\HomePagePromoSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomePagePromoSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomePagePromoSection::create([
            "icon_name" => "ti-link",
            "title" => "Improve Your SEO Ranking",
            "description" => "Improve your page loading speed, Lift your site's general perceivability as its authority in search develops, and get high-quality traffic to your site.",
            "active" => true,
        ]);

        HomePagePromoSection::create([
            "icon_name" => "ti-headphone-alt",
            "title" => "Drive Organic Traffic",
            "description" => "Evaluate influencer marketing, influence on-page SEO, Find and eliminate non-performing content, and drive organic traffic to your site.",
            "active" => true,
        ]);

        HomePagePromoSection::create([
            "icon_name" => "ti-dashboard",
            "title" => "Build Brand Awareness",
            "description" => "The significance of brand awareness reduces the chance of producing more income. Building brand awareness causes your leading interest group to pick you over your competitors.",
            "active" => true,
        ]);
    }
}
