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

        // save if there is an header logo
        if ($request->file('header_logo')) {
            try {
                $file = $request->file('header_logo');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::uuid() . '.' . $extension;
                $filePath = $file->storeAs('backend/upload/general', $filename, 'public');

                $headerLogo = siteSetting('header_logo');

                // Check if the existing image exists using the relative path
                if ($headerLogo && Storage::exists('public/' . $headerLogo)) {
                    // Delete the existing image
                    Storage::delete('public/' . $headerLogo);
                }

                GeneralSetting::updateOrCreate(['name' => 'header_logo'], ['value' => "backend/upload/general/" . $filename]);
            } catch (\Exception $e) {
                Session::flash('error', 'Profile update failed: ' . $e->getMessage());
                return back();
            }
        }

        return back();
    }
}
