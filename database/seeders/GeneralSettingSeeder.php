<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $about = new GeneralSetting();
        $about->name = 'header_logo';
        $about->value = 'backend/upload/general/943292cb-654d-4553-80dd-e7cbd606b53a.png';
        $about->save();

        $about = new GeneralSetting();
        $about->name = 'footer_logo';
        $about->value = 'backend/upload/general/83301606-37e5-4437-b111-5a7098b59c69.png';
        $about->save();

        $about = new GeneralSetting();
        $about->name = 'company_website';
        $about->value = 'www.gpitfirm.com';
        $about->save();

        $about = new GeneralSetting();
        $about->name = 'company_name';
        $about->value = 'GPITFIRM';
        $about->save();

        $about = new GeneralSetting();
        $about->name = 'company_email';
        $about->value = 'admin@gpitfirm.com';
        $about->save();

        $about = new GeneralSetting();
        $about->name = 'company_phone';
        $about->value = '01xxxxxxxxx';
        $about->save();

        $about = new GeneralSetting();
        $about->name = 'company_address';
        $about->value = 'BD Office:  Radha Palbari, Ambaria Madhupur, Tangail, 1997, Dhaka';
        $about->save();

        $about = new GeneralSetting();
        $about->name = 'usa_location';
        $about->value = 'AMRYTT MEDIA LLC 1309 Coffeen Avenue, Suite 5131, Sheridan, WY 82801';
        $about->save();

        $about = new GeneralSetting();
        $about->name = 'about_description';
        $about->value = 'To establish the best agency climate for talented individuals from everywhere globally. GP IT Firm is giving massages to arrive at the objective you have valued. If you join us, you can get the correct services that you want. We provide the best services for link insertion and Guest posting. Our team is always ready for the clients with the best effort.';
        $about->save();
    }
}
