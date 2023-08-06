<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class GeneralSettingController extends Controller
{
    public function index()
    {
        return view('backend.generalSetting.inedx');
    }

    public function store(Request $request)
    {
        try {
            // save if there is an header logo
            if ($request->file('header_logo')) {
                try {

                    $file = $request->file('header_logo');
                    $extension = $file->getClientOriginalExtension();
                    $filename = Str::uuid() . '.' . $extension;
                    $filePath = $file->storeAs('backend/upload/general', $filename, 'public');
                    $headerLogo = siteSetting('header_logo');

                    // Check if the existing image exists using the relative path and delete
                    if ($headerLogo && Storage::exists('public/' . $headerLogo)) {
                        Storage::delete('public/' . $headerLogo);
                    }
                    GeneralSetting::updateOrCreate(['name' => 'header_logo'], ['value' => "backend/upload/general/" . $filename]);
                } catch (\Exception $e) {
                    Session::flash('error', 'Header logo update failed: ' . $e->getMessage());
                    return back();
                }
            }

            // save if there is an footer logo
            if ($request->file('footer_logo')) {
                try {
                    $file = $request->file('footer_logo');
                    $extension = $file->getClientOriginalExtension();
                    $filename = Str::uuid() . '.' . $extension;
                    $filePath = $file->storeAs('backend/upload/general', $filename, 'public');
                    $footer_logo = siteSetting('footer_logo');

                    // Check if the existing image exists using the relative path and delete
                    if ($footer_logo && Storage::exists('public/' . $footer_logo)) {
                        Storage::delete('public/' . $footer_logo);
                    }
                    GeneralSetting::updateOrCreate(['name' => 'footer_logo'], ['value' => "backend/upload/general/" . $filename]);
                } catch (\Exception $e) {
                    Session::flash('error', 'Footer logo update failed: ' . $e->getMessage());
                    return back();
                }
            }


            // save if there is an favicon
            if ($request->file('favicon')) {
                try {
                    $file = $request->file('favicon');
                    $extension = $file->getClientOriginalExtension();
                    $filename = Str::uuid() . '.' . $extension;
                    $filePath = $file->storeAs('backend/upload/general', $filename, 'public');
                    $favicon = siteSetting('favicon');

                    // Check if the existing image exists using the relative path and delete
                    if ($favicon && Storage::exists('public/' . $favicon)) {
                        Storage::delete('public/' . $favicon);
                    }
                    GeneralSetting::updateOrCreate(['name' => 'favicon'], ['value' => "backend/upload/general/" . $filename]);
                } catch (\Exception $e) {
                    Session::flash('error', 'Favicon update failed: ' . $e->getMessage());
                    return back();
                }
            }

            GeneralSetting::updateOrCreate(['name' => 'company_name'], ['value' => $request->company_name]);
            GeneralSetting::updateOrCreate(['name' => 'company_email'], ['value' => $request->company_email]);
            GeneralSetting::updateOrCreate(['name' => 'company_phone'], ['value' => $request->company_phone]);
            GeneralSetting::updateOrCreate(['name' => 'company_address'], ['value' => $request->company_address]);
            GeneralSetting::updateOrCreate(['name' => 'usa_location'], ['value' => $request->usa_location]);
            GeneralSetting::updateOrCreate(['name' => 'about_description'], ['value' => $request->about_description]);

            // social media
            GeneralSetting::updateOrCreate(['name' => 'facebook'], ['value' => $request->facebook]);
            GeneralSetting::updateOrCreate(['name' => 'instagram'], ['value' => $request->instagram]);
            GeneralSetting::updateOrCreate(['name' => 'linkedin'], ['value' => $request->linkedin]);
            GeneralSetting::updateOrCreate(['name' => 'twitter'], ['value' => $request->twitter]);
            GeneralSetting::updateOrCreate(['name' => 'google'], ['value' => $request->google]);
            GeneralSetting::updateOrCreate(['name' => 'skype'], ['value' => $request->skype]);
        } catch (\Exception $e) {
            Session::flash('error', 'Profile update failed: ' . $e->getMessage());
            return back();
        }

        Session::flash('success', 'Successfully updated');
        return back();
    }
}
