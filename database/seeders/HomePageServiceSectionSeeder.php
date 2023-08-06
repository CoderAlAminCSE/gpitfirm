<?php

namespace Database\Seeders;

use App\Models\HomePageServiceSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomePageServiceSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomePageServiceSection::create([
            "icon_name" => "ti-link",
            "heading" => "Link Building SEO",
            "description" => "Having quality links from different sites is the impacting factor for
            positioning on Google. You can have the quickest, most beautiful site On the planet;
            however, if no one is linking to you, you'll battle for internet searcher traffic.",
            "active" => true,
        ]);

        HomePageServiceSection::create([
            "icon_name" => "ti-settings",
            "heading" => "Content Marketing",
            "description" => "From technique improvement to content creation, distribution to
            dissemination and advancement. Our industry-driving content marketing services are
            designed to accomplish your business objectives.",
            "active" => true,
        ]);

        HomePageServiceSection::create([
            "icon_name" => "ti-pencil-alt",
            "heading" => "Guest Posting SEO",
            "description" => "To further develop your advanced marketing endeavors, you can't overlook the
            significance of guest publishing content to a blog. Even though they have been around
            for some time, this doesn't imply that Search.",
            "active" => true,
        ]);

        HomePageServiceSection::create([
            "icon_name" => "ti-unlink",
            "heading" => "Niche Edit/Link Insertion SEO service",
            "description" => "Niche edits/ link insertion SEO services mark appropriate content pages that
            Google has previously indexed, coming about in a backlink that instantly gives extra
            vital SEO significance to your site.",
            "active" => true,
        ]);

        HomePageServiceSection::create([
            "icon_name" => "ti-wordpress",
            "heading" => "Web Design &amp; Development",
            "description" => "Web design refers to the design of websites that are displayed on the
            internet. It usually refers to the user experience aspects of website development rather
            than software development.",
            "active" => true,
        ]);

        HomePageServiceSection::create([
            "icon_name" => "ti-announcement",
            "heading" => "Digital Marketing",
            "description" => "Digital marketing is the component of marketing that uses the Internet and
            online based digital technologies such as desktop computers, mobile phones and other
            digital media and platforms to promote products and services.",
            "active" => true,
        ]);
    }
}
