<?php

use App\Models\GeneralSetting;
use App\Models\HomePageHeroSection;
use App\Models\HomePagePromoSection;
use Illuminate\Support\Facades\Auth;


//logged in user data
function loggedInUser()
{
  return Auth::user();
}

// get value from "general_settings" table
function siteSetting($name)
{
  $setting = GeneralSetting::where('name', $name)->first();
  return $setting ? $setting->value : '';
}

// get value from "home_page_hero_section" table
function homePageHeroSection($name)
{
  $setting = HomePageHeroSection::where('name', $name)->first();
  return $setting ? $setting->value : '';
}


// get value from "home_page_hero_section" table
function homePagePromoSection()
{
  return HomePagePromoSection::all();
}
