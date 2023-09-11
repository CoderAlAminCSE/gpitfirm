<?php

namespace Database\Seeders;

use App\Models\HomePageHeroSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomePageHeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $about = new HomePageHeroSection();
        $about->name = 'title';
        $about->value = 'Link Building Content Writing';
        $about->save();

        $about = new HomePageHeroSection();
        $about->name = 'button';
        $about->value = 'Get Started';
        $about->save();

        $about = new HomePageHeroSection();
        $about->name = 'description';
        $about->value = 'Guest posting and the Linking building are decent and leading strategies for SEO. Attach with GP IT Firm and get the proper professional and reliable SEO services';
        $about->save();
    }
}
