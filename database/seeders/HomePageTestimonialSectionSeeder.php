<?php

namespace Database\Seeders;

use App\Models\HomePageTestimonialSection;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomePageTestimonialSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomePageTestimonialSection::create([
            "name" => "John Charles",
            "image" => "backend/upload/pages/e2a50201-172a-445d-af16-be504627832c.jpg",
            "message" => "I am delighted with the service from GP IT firm. Timely work delivery and sincerity are outstanding.",
            "active" => true,
        ]);

        HomePageTestimonialSection::create([
            "name" => "Arabella Ora",
            "image" => "backend/upload/pages/4ec27bd1-8c28-4a5f-8922-a028d57b5f0e.jpg",
            "message" => "I am delighted with the service from GP IT firm. Timely work delivery and sincerity are outstanding.",
            "active" => true,
        ]);

        HomePageTestimonialSection::create([
            "name" => "Jeremy Jere",
            "image" => "backend/upload/pages/b9b74f59-572e-4ab2-995f-872ef5a3b0cc.jpg",
            "message" => "An impressive service provider with polite behavior. I like it.",
            "active" => true,
        ]);

        HomePageTestimonialSection::create([
            "name" => "John Charles",
            "image" => "backend/upload/pages/08b048f9-fcc4-4e85-9890-ff8b15ade0e6.jpg",
            "message" => "I am delighted with the service from GP IT firm. Timely work delivery and sincerity are outstanding.",
            "active" => true,
        ]);
    }
}
