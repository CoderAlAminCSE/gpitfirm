<?php

namespace Database\Seeders;

use App\Models\FaqPageContent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FaqPageContent::create([
            "icon_name" => "ti-receipt",
            "question" => "Why do we need guest posting for Off-page SEO?",
            "answer" => "Off-page SEO or outside SEO is a term that alludes to all the SEO exercises that you improve without touching your site’s internal design or content. For off-page SEO, you, for the most part, make links to your sites. These links to your site are called backlinks. Guest posting encourages Off-Page SEO to bring new crowds and engage, and back category looks on Google. Yet, backlinks aregenerally intense, and you need to make backlinks from your guest posts.",
            "active" => true,
        ]);

        FaqPageContent::create([
            "icon_name" => "ti-gallery",
            "question" => "Why is link building the most effective for SEO?",
            "answer" => "One-way hyperlinks (otherwise called “backlinks”) to a site determined to develop web search tool perceivability further.Traditional link-building techniques include content marketing, making helpful apparatuses, email outreach, broken link building, and advertising. Link building is gainful and indispensable for SEO. With definitive link building, you can improve web traffic, website grids, and SEO achievements. Finally, it will give you consecutive quotation traffic for your location.",
            "active" => true,
        ]);

        FaqPageContent::create([
            "icon_name" => "ti-wallet",
            "question" => "Can we get the guest posting services for all niches?",
            "answer" => "Except for grown-up sites, we provide guest posting administrations in practically all specialties.",
            "active" => true,
        ]);

        FaqPageContent::create([
            "icon_name" => "ti-receipt",
            "question" => "Can we get the niche editing services?",
            "answer" => "Yes, we are available for the profession to distort or link the existing article, which is indexed.",
            "active" => true,
        ]);

        FaqPageContent::create([
            "icon_name" => "ti-lock",
            "question" => "Are writing and publishing services available here?",
            "answer" => "Yes, we do. To begin this, you. To give us designated Catchphrases and page URLs alongside specialties inclinations if conceivable. Then, at that point, we’ll distribute it on your predetermined site.",
            "active" => true,
        ]);

        FaqPageContent::create([
            "icon_name" => "ti-widget",
            "question" => "Can I post my writings here?",
            "answer" => "Yes, you can do that. In any case, you need to ensure that the article’s writing must be finished before placing the request to forestall the delay in publishing.",
            "active" => true,
        ]);
    }
}
