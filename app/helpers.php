<?php

use Carbon\Carbon;
use App\Models\Site;
use App\Models\User;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\Service;
use App\Models\Category;
use App\Models\OrderItem;
use App\Models\RefundPage;
use App\Models\ContactMessage;
use App\Models\FaqPageContent;
use App\Models\GeneralSetting;
use App\Models\PrivacyPolicyPage;
use App\Models\ResellerRulesPage;
use App\Models\TermsConditionPage;
use Illuminate\Support\Facades\DB;
use App\Models\HomePageHeroSection;
use App\Models\HomePageAboutSection;
use App\Models\HomePagePromoSection;
use Illuminate\Support\Facades\Auth;
use App\Models\HomePageContactSection;
use App\Models\HomePageServiceSection;
use App\Models\HomePageTestimonialSection;

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

//all customers data
function allCustomers()
{
  return User::latest()->get();
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


// get value from "sites" table
function activeSites()
{
  return Site::where('active', true)->get();
}

// get as value order wise from "sites" table
function activeSitesOrderWise()
{
  return Site::orderBy('order', 'ASC')->get();
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


// get orders from "order" table
function orders()
{
  return Order::latest()->get();
}


// get orders from "order" table
function invoices()
{
  return Invoice::latest()->get();
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


// get value from "ContactMessages" table
function contactMessageInfo($id)
{
  return ContactMessage::where('id', $id)->first();
}


// encrypt the invoice number
function encryptInvoiceNumber($invoiceNumber)
{
  $encrypted = base64_encode($invoiceNumber . '-' . 'secret');
  return $encrypted;
}


// decrypt the invoice number
function decryptInvoiceNumber($encryptedInvoiceNumber)
{
  $decrypted = base64_decode($encryptedInvoiceNumber);
  $decrypted = str_replace('-' . 'secret', '', $decrypted);
  return $decrypted;
}


// count the total paid amount
function totalPaidAmount()
{
  return Order::where('payment_status', 1)->sum('total_amount');
}


// count the total unpaid amount
function totalUnpaidAmount()
{
  return Order::where('payment_status', 0)->whereNull('canceled_at')->sum('total_amount');
}


// count the total canceled amount
function totalCanceledAmount()
{
  return Order::whereNotNull('canceled_at')->sum('total_amount');
}



function monthWiseTotalOrderAmount()
{
  $monthWiseTotalAmount = Order::select(
    DB::raw('SUM(total_amount) as total_amount'),
    DB::raw('MONTH(created_at) as month')
  )
    ->groupBy(DB::raw('MONTH(created_at)'))
    ->orderBy(DB::raw('MONTH(created_at)'))
    ->pluck('total_amount', 'month')
    ->all();

  $formattedTotalAmount = [];
  for ($month = 1; $month <= 12; $month++) {
    $formattedTotalAmount[] = isset($monthWiseTotalAmount[$month]) ? $monthWiseTotalAmount[$month] : 0;
  }

  return implode(', ', $formattedTotalAmount);
}


function monthWiseTotalPaidAmount()
{
  $monthWiseTotalPaidAmount = Order::select(
    DB::raw('SUM(CASE WHEN payment_status = 1 THEN total_amount ELSE 0 END) as total_paid_amount'),
    DB::raw('MONTH(created_at) as month')
  )
    ->groupBy(DB::raw('MONTH(created_at)'))
    ->orderBy(DB::raw('MONTH(created_at)'))
    ->pluck('total_paid_amount', 'month')
    ->all();

  $formattedTotalPaidAmount = [];
  for ($month = 1; $month <= 12; $month++) {
    $formattedTotalPaidAmount[] = isset($monthWiseTotalPaidAmount[$month]) ? $monthWiseTotalPaidAmount[$month] : 0;
  }

  return implode(', ', $formattedTotalPaidAmount);
}


function monthWiseTotalCanceledAmount()
{
  $monthWiseTotalCanceledAmount = Order::select(
    DB::raw('SUM(CASE WHEN canceled_at IS NOT NULL THEN total_amount ELSE 0 END) as total_canceled_amount'),
    DB::raw('MONTH(created_at) as month')
  )
    ->groupBy(DB::raw('MONTH(created_at)'))
    ->orderBy(DB::raw('MONTH(created_at)'))
    ->pluck('total_canceled_amount', 'month')
    ->all();

  $formattedTotalCanceledAmount = [];
  for ($month = 1; $month <= 12; $month++) {
    $formattedTotalCanceledAmount[] = isset($monthWiseTotalCanceledAmount[$month]) ? $monthWiseTotalCanceledAmount[$month] : 0;
  }

  return implode(', ', $formattedTotalCanceledAmount);
}


function monthWiseTotalPendingAmount()
{
  $monthWiseTotalPendingAmount = Order::select(
    DB::raw('SUM(CASE WHEN payment_status = 0 AND canceled_at IS NULL THEN total_amount ELSE 0 END) as total_pending_amount'),
    DB::raw('MONTH(created_at) as month')
  )
    ->groupBy(DB::raw('MONTH(created_at)'))
    ->orderBy(DB::raw('MONTH(created_at)'))
    ->pluck('total_pending_amount', 'month')
    ->all();

  $formattedTotalPendingAmount = [];
  for ($month = 1; $month <= 12; $month++) {
    $formattedTotalPendingAmount[] = isset($monthWiseTotalPendingAmount[$month]) ? $monthWiseTotalPendingAmount[$month] : 0;
  }

  return implode(', ', $formattedTotalPendingAmount);
}


function getOrdersReportBasedOnTimeRange($timeRange)
{
  switch ($timeRange) {
    case 'today':
      $today = Carbon::now()->toDateString();
      return Order::whereDate('created_at', $today)->with('invoice')->paginate(10);
    case 'last7days':
      $last7Days = Carbon::now()->subDays(7);
      return Order::where('created_at', '>=', $last7Days)->with('invoice')->paginate(10);
    case 'last30days':
      $last30Days = Carbon::now()->subDays(30);
      return Order::where('created_at', '>=', $last30Days)->with('invoice')->paginate(10);

    default:
      return Order::with('invoice')->latest()->paginate(10);
  }
}
