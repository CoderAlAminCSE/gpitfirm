<?php

use App\Models\Site;
use App\Models\FaqPageContent;
use App\Models\GeneralSetting;
use App\Models\HomePageHeroSection;
use App\Models\HomePageAboutSection;
use App\Models\HomePagePromoSection;
use Illuminate\Support\Facades\Auth;
use App\Models\HomePageContactSection;
use App\Models\HomePageServiceSection;
use App\Models\HomePageTestimonialSection;
use App\Models\PrivacyPolicyPage;
use App\Models\RefundPage;
use App\Models\ResellerRulesPage;
use App\Models\TermsConditionPage;

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


// get value from "home_page_hero_section" table
function homePageAboutSection($name)
{
  $setting = HomePageAboutSection::where('name', $name)->first();
  return $setting ? $setting->value : null;
}


// get value from "home_page_service_section" table
function homePageServiceSection()
{
  return HomePageServiceSection::where('active', true)->get();
}


// get value from "home_page_TESTIMONIAL_section" table
function homePageTestimonialSection()
{
  return HomePageTestimonialSection::where('active', true)->get();
}


// get value from "home_page_hero_section" table
function homePageContactSection($name)
{
  $contact = HomePageContactSection::where('name', $name)->first();
  return $contact ? $contact->value : null;
}


// get value from "faq page" table
function faqContents()
{
  return FaqPageContent::where('active', true)->get();
}


// get value from "faq sites" table
function activeSites()
{
  return Site::where('active', true)->get();
}


// get value from "refund page" table
function refundPageContent($name)
{
  $contact = RefundPage::where('name', $name)->first();
  return $contact ? $contact->value : null;
}


// get value from "refund page" table
function privacyPolicyPageContent($name)
{
  $contact = PrivacyPolicyPage::where('name', $name)->first();
  return $contact ? $contact->value : null;
}


// get value from "reseller rules page" table
function resellerRulesPageContent($name)
{
  $contact = ResellerRulesPage::where('name', $name)->first();
  return $contact ? $contact->value : null;
}


// get value from "reseller rules page" table
function termsConditionPageContent($name)
{
  $contact = TermsConditionPage::where('name', $name)->first();
  return $contact ? $contact->value : null;
}
