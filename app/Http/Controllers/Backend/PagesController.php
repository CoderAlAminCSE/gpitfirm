<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\HomePageHeroSection;
use App\Http\Controllers\Controller;
use App\Models\HomePagePromoSection;
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



    public function promoIndex(Request $request)
    {
        try {
            if ($request->has('search') && $request->search != null) {
                $search =  $request->search;
                $promos = HomePagePromoSection::where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', '%' . $search . '%')
                        ->orWhere('icon_name', 'LIKE', '%' . $search . '%')
                        ->orWhere('title', 'LIKE', '%' . $search . '%');
                })->paginate(10);
            } else {
                $promos = HomePagePromoSection::latest()->paginate(10);
            }
        } catch (\Exception $e) {
            Session::flash('error', 'Error: ' . $e->getMessage());
            return back();
        }
        return view('backend.pages.home.promo.index', compact('promos'));
    }



    public function promoCreate(Request $request)
    {
        try {
            // validation start
            $validate = $request->validate([
                'icon_name' => ['required'],
                'title' => ['required'],
                'description' => ['required'],
            ]); // end of validation

            $promo = new HomePagePromoSection();
            $promo->icon_name = $request->icon_name;
            $promo->title = $request->title;
            $promo->description = $request->description;
            if ($request->active) {
                $promo->active = true;
            }
            $promo->save();
        } catch (\Exception $e) {
            Session::flash('error', 'Promo sectoin create failed: ' . $e->getMessage());
            return back();
        }

        Session::flash('success', 'Promo sectoin created successfully');
        return back();
    }



    public function promoUpdate($id)
    {
        $promo = HomePagePromoSection::findOrFail($id);
        return view('backend.pages.home.promo.update', compact('promo'));
    }


    public function promoUpdateStore(Request $request, $id)
    {
        try {
            // validation start
            $validate = $request->validate([
                'icon_name' => ['required'],
                'title' => ['required'],
                'description' => ['required'],
            ]); // end of validation

            $promo = HomePagePromoSection::findOrFail($id);
            $promo->icon_name = $request->icon_name;
            $promo->title = $request->title;
            $promo->description = $request->description;
            $promo->active = $request->active ? true : false;
            $promo->save();
        } catch (\Exception $e) {
            Session::flash('error', 'Promo sectoin update failed: ' . $e->getMessage());
            return back();
        }

        Session::flash('success', 'Promo sectoin updated successfully');
        return redirect()->route('pages.home.promo.index');
    }


    public function promoDelete($id)
    {
        $promo = HomePagePromoSection::findOrFail($id);
        $promo->delete();
        Session::flash('success', 'Promo deleted successfully');
        return back();
    }
}
