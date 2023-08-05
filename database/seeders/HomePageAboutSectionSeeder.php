<?php

namespace Database\Seeders;

use App\Models\HomePageAboutSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomePageAboutSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $about = new HomePageAboutSection();
        $about->name = 'heading';
        $about->value = 'Why GP IT Firm for SEO services?';
        $about->save();

        $about = new HomePageAboutSection();
        $about->name = 'description';
        $about->value = 'To establish the best agency climate for talented individuals from everywhere globally. GP IT Firm is giving massages to arrive at the objective you have valued. If you join us, you can get the correct services that you want. We provide the best services for link insertion and Guest posting. Our team is always ready for the clients with the best effort. Our organization develops influential associations with clients accomplices. Visit us and get the best services we provide at a reasonable cost for clients. We Take care of clients holistically. We’re as cautious about clients’ financial plans as clients are.';
        $about->save();

        $about = new HomePageAboutSection();
        $about->name = 'image ';
        $about->value = 'backend/upload/pages/44c603c3-fe62-401f-af5b-e70670406960.png';
        $about->save();
    }
}
