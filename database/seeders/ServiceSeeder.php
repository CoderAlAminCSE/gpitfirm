<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            "name" => "Guest Posting DA 50+",
            "title" => "DA50+",
            "slug" => "guest-posting-da-50",
            "category_id" => 1,
            "price" => 500.00,
            "description" => "<div class=/'price-name/' style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: 'open sans', sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; color: #707070; text-align: center;/'>
            <h5 class=/'mb-0/' style=/'box-sizing: border-box; line-height: 1.21; font-size: 1.25em; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-family: montserrat, sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; -webkit-font-smoothing: antialiased; color: #40005d; margin: 0px 0px 0px !important 0px;/'>10 GUEST POSTS INCLUDED</h5>
            </div>
            <div class=/'card-body/' style=/'box-sizing: border-box; margin: 0px; padding: 1.5rem; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: /'open sans/', sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; flex: 1 1 auto; color: #8492a6; text-align: center;/'>
            <ul class=/'list-unstyled mb-4 pricing-feature-list/' style=/'box-sizing: border-box; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; list-style: none; margin: 0px 0px 1.5rem !important 0px;/'>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>DA 50+ (10 Websites)</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>Writing and publishing</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>Included 600+ Word Articles</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>2 Do-Follow Links Per Post</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>Normal Processing Time 1 Weeks</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>Without Adult Other All Niche Allowed</li>
            </ul>
            </div>",
            "active" => true,
        ]);


        Service::create([
            "name" => "Guest Posting DA 60+",
            "title" => "DA60+",
            "slug" => "guest-posting-da-60",
            "category_id" => 1,
            "price" => 700.00,
            "description" => "<div class=/'price-name/' style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: /'open sans/', sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; color: #707070; text-align: center;/'>
            <h5 class=/'mb-0/' style=/'box-sizing: border-box; line-height: 1.21; font-size: 1.25em; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-family: montserrat, sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; -webkit-font-smoothing: antialiased; color: #40005d; margin: 0px 0px 0px !important 0px;/'>10 GUEST POSTS INCLUDED</h5>
            </div>
            <div class=/'card-body/' style=/'box-sizing: border-box; margin: 0px; padding: 1.5rem; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: 'open sans', sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; flex: 1 1 auto; color: #8492a6; text-align: center;/'>
            <ul class=/'list-unstyled mb-4 pricing-feature-list/' style=/'box-sizing: border-box; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; list-style: none; margin: 0px 0px 1.5rem !important 0px;/'>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>DA 60+ (10 Websites)</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit;                 font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>Writing and publishing</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>Included 600+ Word Articles</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>2 Do-Follow Links Per Post</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>Normal Processing Time 1 Weeks</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>Without Adult Other All Niche Allowed</li>
            </ul>
            </div>",
            "active" => true,
        ]);


        Service::create([
            "name" => "Guest Posting DA 70+",
            "title" => "DA70+",
            "slug" => "guest-posting-da-70",
            "category_id" => 1,
            "price" => 900.00,
            "description" => "<div class=/'price-name/' style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: /'open sans/', sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; color: #707070; text-align: center;/'>
            <h5 class=/'mb-0/' style=/'box-sizing: border-box; line-height: 1.21; font-size: 1.25em; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-family: montserrat, sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; -webkit-font-smoothing: antialiased; color: #40005d; margin: 0px 0px 0px !important 0px;/'>10 GUEST POSTS INCLUDED</h5>
            </div>
            <div class=/'card-body/' style=/'box-sizing: border-box; margin: 0px; padding: 1.5rem; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: 'open sans', sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; flex: 1 1 auto; color: #8492a6; text-align: center;/'
            <ul class=/'list-unstyled mb-4 pricing-feature-list/' style=/'box-sizing: border-box; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; list-style: none; margin: 0px 0px 1.5rem !important 0px;/'>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>DA 70+ (10 Websites)</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>Writing and publishing</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>Included 600+ Word Articles</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>2 Do-Follow Links Per Post</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>Normal Processing Time 1 Weeks</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>Without Adult Other All Niche Allowed</li>
            </ul>
            </div>",
            "active" => true,
        ]);


        Service::create([
            "name" => "Link Building DA 50+",
            "title" => "DA 50+",
            "slug" => "link-building-da-50",
            "category_id" => 2,
            "price" => 450.00,
            "description" => "<div class=/'price-name/' style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: /'open sans/', sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; color: #707070; text-align: center;/'>
            <h5 class=/'mb-0/' style=/'box-sizing: border-box; line-height: 1.21; font-size: 1.25em; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-family: montserrat, sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; -webkit-font-smoothing: antialiased; color: #40005d; margin: 0px 0px 0px !important 0px;/'>10 GUEST LINK INCLUDED</h5>
            </div>
            <div class=/'card-body/' style=/'box-sizing: border-box; margin: 0px; padding: 1.5rem; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: 'open sans', sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; flex: 1 1 auto; color: #8492a6; text-align: center;/'>
            <ul class=/'list-unstyled mb-4 pricing-feature-list/' style=/'box-sizing: border-box; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; list-style: none; margin: 0px 0px 1.5rem !important 0px;/'>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>DA 50+ (10 Websites)</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>Niche Edit With Category</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>Included Google index</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>1 Do-Follow Link Get Per Post</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>Normal Processing Time 1 Weeks</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>Without Adult Other All Niche Link Allowed</li>
            </ul>
            </div>",
            "active" => true,
        ]);


        Service::create([
            "name" => "Link Building DA 60+",
            "title" => "DA 60+",
            "slug" => "link-building-da-60",
            "category_id" => 2,
            "price" => 650.00,
            "description" => "<div class=/'price-name/' style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: /'open sans/', sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; color: #707070; text-align: center;/'>
            <h5 class=/'mb-0/' style=/'box-sizing: border-box; line-height: 1.21; font-size: 1.25em; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-family: montserrat, sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; -webkit-font-smoothing: antialiased; color: #40005d; margin: 0px 0px 0px !important 0px;/'>10 GUEST LINK INCLUDED</h5>
            </div>
            <div class=/'card-body/' style=/'box-sizing: border-box; margin: 0px; padding: 1.5rem; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: 'open sans', sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; flex: 1 1 auto; color: #8492a6; text-align: center;/'>
            <ul class=/'list-unstyled mb-4 pricing-feature-list/' style=/'box-sizing: border-box; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; list-style: none; margin: 0px 0px 1.5rem !important 0px;/'>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>DA 60+ (10 Websites)</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>Niche Edit With Category</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>Included Google index</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>1 Do-Follow Link Get Per Post</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>Normal Processing Time 1 Weeks</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>Without Adult Other All Niche Link Allowed</li>
            </ul>
            </div>",
            "active" => true,
        ]);



        Service::create([
            "name" => "Link Building DA 70+",
            "title" => "DA 70+",
            "slug" => "link-building-da-70",
            "category_id" => 2,
            "price" => 850.00,
            "description" => "<div class=/'price-name/' style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: /'open sans/', sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; color: #707070; text-align: center;/'>
            <h5 class=/'mb-0/' style=/'box-sizing: border-box; line-height: 1.21; font-size: 1.25em; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; font-family: montserrat, sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; -webkit-font-smoothing: antialiased; color: #40005d; margin: 0px 0px 0px !important 0px;/'>10 GUEST LINK INCLUDED</h5>
            </div>
            <div class=/'card-body/' style=/'box-sizing: border-box; margin: 0px; padding: 1.5rem; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-variant-alternates: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: 'open sans', sans-serif; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline; flex: 1 1 auto; color: #8492a6; text-align: center;/'>
            <ul class=/'list-unstyled mb-4 pricing-feature-list/' style=/'box-sizing: border-box; padding: 0px; border: 0px; font: inherit; vertical-align: baseline; list-style: none; margin: 0px 0px 1.5rem !important 0px;/'>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>DA 70+ (10 Websites)</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>Niche Edit With Category</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>Included Google index</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>1 Do-Follow Link Get Per Post</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>Normal Processing Time 1 Weeks</li>
            <li style=/'box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 14px; line-height: 30px; font-family: inherit; font-optical-sizing: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit; vertical-align: baseline;/'>Without Adult Other All Niche Link Allowed</li>
            </ul>
            </div>",
            "active" => true,
        ]);



    }
}
