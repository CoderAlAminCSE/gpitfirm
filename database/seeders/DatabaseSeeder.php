<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(HomePagePromoSectionSeeder::class);
        $this->call(HomePageAboutSectionSeeder::class);
        $this->call(HomePageServiceSectionSeeder::class);
        $this->call(HomePageTestimonialSectionSeeder::class);
        $this->call(HomePageContactSectionSeeder::class);
        $this->call(FaqSeeder::class);
        $this->call(SiteSeeder::class);
        $this->call(RefundPageSeeder::class);
        $this->call(PrivacyPolicyPageSeeder::class);
        $this->call(ResellerRulesPageSeeder::class);
    }
}
