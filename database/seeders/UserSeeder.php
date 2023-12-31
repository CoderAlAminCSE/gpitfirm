<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "admin",
            "business_name" => "admin boss bd",
            "email" => "admin@mail.com",
            "address" => "Uttara, Dhaka",
            "type" => "admin",
            "image" => "assets/backend/upload/profile/1690875269profile1.jpg",
            "password" => '$2y$10$2dXuJopzVDaHsxTTVl.CZexCjLpOG.Im5ncG8XV53ZAQoKlif69iS',
        ]);

        User::create([
            "name" => "Rasel",
            "business_name" => "Rasel metromony bd",
            "fname" => "Md",
            "lname" => "Rasel",
            "email" => "customer@mail.com",
            "address" => "Airport, Dhaka",
            "type" => "customer",
            "password" => '$2y$10$2dXuJopzVDaHsxTTVl.CZexCjLpOG.Im5ncG8XV53ZAQoKlif69iS',
        ]);

        User::create([
            "name" => "Shihab",
            "business_name" => "Shihab car ltd",
            "fname" => "Md",
            "lname" => "Shihab",
            "email" => "customer1@mail.com",
            "address" => "Badda, Dhaka",
            "type" => "customer",
            "password" => '$2y$10$2dXuJopzVDaHsxTTVl.CZexCjLpOG.Im5ncG8XV53ZAQoKlif69iS',
        ]);
    }
}
