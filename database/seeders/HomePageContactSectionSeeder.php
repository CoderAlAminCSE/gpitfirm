<?php

namespace Database\Seeders;

use App\Models\HomePageContactSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomePageContactSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $about = new HomePageContactSection();
        $about->name = 'heading';
        $about->value = 'Why need paid guest post to increase website SEO ranking?';
        $about->save();

        $about = new HomePageContactSection();
        $about->name = 'description';
        $about->value = 'GP IT Firm is spread in these areas, and you can quickly distribute your substance on most visited sites. We’re utilizing capable, trustworthy guest posting and link-building service to get top-notch backlinks from solid stages and push the site to the top.';
        $about->save();
    }
}
