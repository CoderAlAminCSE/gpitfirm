<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\HomePageHeroSection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    public function homeIndex()
    {
        return view('backend.pages.home.hero.index');
    }

    public function homeUpdate(Request $request)
    {
         //    validation start
         $validate = $request->validate([
            'title' => ['required'],
            'button' => ['required'],
            'description' => ['required'],
        ]); // end of validation

        try {
            if ($request->file('image')) {
                try {
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = Str::uuid() . '.' . $extension;
                    $filePath = $file->storeAs('backend/upload/pages', $filename, 'public');
                    $image = homePageHeroSection('image');

                    // Check if the existing image exists using the relative path and delete
                    if ($image && Storage::exists('public/' . $image)) {
                        Storage::delete('public/' . $image);
                    }
                    HomePageHeroSection::updateOrCreate(['name' => 'image'], ['value' => "backend/upload/pages/" . $filename]);
                } catch (\Exception $e) {
                    Session::flash('error', 'Image update failed: ' . $e->getMessage());
                    return back();
                }
            }

            HomePageHeroSection::updateOrCreate(['name' => 'title'], ['value' => $request->title]);
            HomePageHeroSection::updateOrCreate(['name' => 'button'], ['value' => $request->button]);
            HomePageHeroSection::updateOrCreate(['name' => 'description'], ['value' => $request->description]);
        } catch (\Exception $e) {
            Session::flash('error', 'Home page hero section update failed: ' . $e->getMessage());
            return back();
        }

        Session::flash('success', 'Home page hero section successfully updated');
        return back();
    }
}
