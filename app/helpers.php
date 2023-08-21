<?php

use App\Models\Site;
use App\Models\User;
use App\Models\Service;
use App\Models\Category;
use App\Models\RefundPage;
use App\Models\FaqPageContent;
use App\Models\GeneralSetting;
use App\Models\PrivacyPolicyPage;
use App\Models\ResellerRulesPage;
use App\Models\TermsConditionPage;
use App\Models\HomePageHeroSection;
use App\Models\HomePageAboutSection;
use App\Models\HomePagePromoSection;
use Illuminate\Support\Facades\Auth;
use App\Models\HomePageContactSection;
use App\Models\HomePageServiceSection;
use App\Models\HomePageTestimonialSection;
use App\Models\Order;
use App\Models\OrderItem;

//logged in user data
function loggedInUser()
{
  return Auth::user();
}


//user data
function userData($id)
{
  return User::findOrFail($id);
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


//update env variable data
function overWriteEnvFile($type, $val)
{
  $path = base_path('.env');
  if (file_exists($path)) {
    $val = '"' . trim($val) . '"';
    if (is_numeric(strpos(file_get_contents($path), $type)) && strpos(file_get_contents($path), $type) >= 0) {
      file_put_contents($path, str_replace($type . '="' . env($type) . '"', $type . '=' . $val, file_get_contents($path)));
    } else {
      file_put_contents($path, file_get_contents($path) . "\r\n" . $type . '=' . $val);
    }
  }
}



// get active value from "service category" table
function activeCategory()
{
  return Category::where('active', true)->get();
}


// get active value from "service category" table
function serviceInfo($id)
{
  return Service::findOrFail($id);
}


// get active value from "service category" table
function activeServices()
{
  return Service::where('active', true)->get();
}


// get active value from "service category" table
function categoryWiseServices($id)
{
  return Service::where('category_id', $id)->where('active', true)->get();
}


// get value from "order" table
function orderInfo($id)
{
  return Order::where('id', $id)->first();
}


// get value from "order" table
function orderIdWiseOrderItem($orderId)
{
  return OrderItem::where('order_id', $orderId)->get();
}
