<?php

use App\Models\GeneralSetting;
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