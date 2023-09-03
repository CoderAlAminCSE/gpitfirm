<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\HomePageHeroSection;
use App\Http\Controllers\Controller;
use App\Models\HomePageAboutSection;
use App\Models\HomePageContactSection;
use App\Models\HomePagePromoSection;
use App\Models\HomePageServiceSection;
use App\Models\HomePageTestimonialSection;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PagesController extends Controller
{
    /**
     * Display the home page hero section index page content.
     */
    public function homeIndex()
    {
        return view('backend.pages.home.hero.index');
    }


    /**
     * Update page hero section index page content.
     */
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

                    // Check if the existing image exists using the relative path and deleted
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


    /**
     * Display the home page promo section index page content.
     */
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



    /**
     * Create home page promo section content.
     */
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



    /**
     * Edit home page promo section content.
     */
    public function promoUpdate($id)
    {
        $promo = HomePagePromoSection::findOrFail($id);
        return view('backend.pages.home.promo.update', compact('promo'));
    }


    /**
     * Update home page promo section content.
     */
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


    /**
     * Delete home page promo section content.
     */
    public function promoDelete($id)
    {
        $promo = HomePagePromoSection::findOrFail($id);
        $promo->delete();
        Session::flash('success', 'Promo deleted successfully');
        return back();
    }


    /**
     * Sisplay the home page about section content.
     */
    public function aboutIndex()
    {
        try {
            return view('backend.pages.home.about.index');
        } catch (\Exception $e) {
            Session::flash('error', 'Error: ' . $e->getMessage());
            return back();
        }
    }


    /**
     * Update or create home page about section content.
     */
    public function aboutUpdate(Request $request)
    {
        //    validation start
        $validate = $request->validate([
            'image' => ['required'],
            'heading' => ['required'],
            'description' => ['required'],
        ]); // end of validation

        try {
            if ($request->file('image')) {
                try {
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = Str::uuid() . '.' . $extension;
                    $filePath = $file->storeAs('backend/upload/pages', $filename, 'public');
                    $image = homePageAboutSection('image');

                    // Check if the existing image exists using the relative path and delete
                    if ($image && Storage::exists('public/' . $image)) {
                        Storage::delete('public/' . $image);
                    }
                    HomePageAboutSection::updateOrCreate(['name' => 'image'], ['value' => "backend/upload/pages/" . $filename]);
                } catch (\Exception $e) {
                    Session::flash('error', 'Image update failed: ' . $e->getMessage());
                    return back();
                }
            }

            HomePageAboutSection::updateOrCreate(['name' => 'heading'], ['value' => $request->heading]);
            HomePageAboutSection::updateOrCreate(['name' => 'description'], ['value' => $request->description]);
        } catch (\Exception $e) {
            Session::flash('error', 'Home page about section update failed: ' . $e->getMessage());
            return back();
        }

        Session::flash('success', 'Home page about section successfully updated');
        return back();
    }


    /**
     * Display the home page service section content.
     */
    public function servicesIndex(Request $request)
    {
        try {
            if ($request->has('search') && $request->search != null) {
                $search =  $request->search;
                $services = HomePageServiceSection::where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', '%' . $search . '%')
                        ->orWhere('icon_name', 'LIKE', '%' . $search . '%')
                        ->orWhere('heading', 'LIKE', '%' . $search . '%');
                })->paginate(10);
            } else {
                $services = HomePageServiceSection::latest()->paginate(10);
            }
        } catch (\Exception $e) {
            Session::flash('error', 'Error: ' . $e->getMessage());
            return back();
        }
        return view('backend.pages.home.service.index', compact('services'));
    }


    /**
     * Create home page service section new content.
     */
    public function servicesCreate(Request $request)
    {
        // validation start
        $validate = $request->validate([
            'heading' => ['required'],
            'description' => ['required'],
        ]); // end of validation
        try {
            $service = new HomePageServiceSection();
            $service->icon_name = $request->icon_name;
            $service->heading = $request->heading;
            $service->description = $request->description;
            if ($request->active) {
                $service->active = true;
            }
            $service->save();
        } catch (\Exception $e) {
            Session::flash('error', 'Service sectoin create failed: ' . $e->getMessage());
            return back();
        }

        Session::flash('success', 'Service sectoin created successfully');
        return back();
    }


    /**
     * Edit home page service section content.
     */
    public function servicesEdit($id)
    {
        $service = HomePageServiceSection::findOrFail($id);
        return view('backend.pages.home.service.edit', compact('service'));
    }


    /**
     * Update home page service section content.
     */
    public function servicesUpdate(Request $request, $id)
    {
        // validation start
        $validate = $request->validate([
            'heading' => ['required'],
            'description' => ['required'],
        ]); // end of validation
        try {
            $service = HomePageServiceSection::findOrFail($id);
            $service->icon_name = $request->icon_name;
            $service->heading = $request->heading;
            $service->description = $request->description;
            $service->active = $request->active ? true : false;
            $service->save();
        } catch (\Exception $e) {
            Session::flash('error', 'Service sectoin update failed: ' . $e->getMessage());
            return back();
        }

        Session::flash('success', 'Service sectoin updated successfully');
        return redirect()->route('pages.home.service.index');
    }


    /**
     * Delete home page service section content.
     */
    public function serviceDelete($id)
    {
        $promo = HomePageServiceSection::findOrFail($id);
        $promo->delete();
        Session::flash('success', 'Service deleted successfully');
        return back();
    }


    /**
     * Display home page testimonial section  content.
     */
    public function testimonialIndex(Request $request)
    {
        try {
            if ($request->has('search') && $request->search != null) {
                $search =  $request->search;
                $testimonials = HomePageTestimonialSection::where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', '%' . $search . '%')
                        ->orWhere('name', 'LIKE', '%' . $search . '%');
                })->paginate(10);
            } else {
                $testimonials = HomePageTestimonialSection::latest()->paginate(10);
            }
        } catch (\Exception $e) {
            Session::flash('error', 'Error: ' . $e->getMessage());
            return back();
        }
        return view('backend.pages.home.testimonial.index', compact('testimonials'));
    }


    /**
     * Create  home page testimonial new section  content.
     */
    public function testimonialCreate(Request $request)
    {
        //    validation start
        $validate = $request->validate([
            'image' => ['required'],
            'name' => ['required'],
            'message' => ['required'],
        ]); // end of validation

        try {
            $testimonial = new HomePageTestimonialSection();
            $testimonial->name = $request->name;
            $testimonial->message = $request->message;

            if ($request->file('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::uuid() . '.' . $extension;
                $filePath = $file->storeAs('backend/upload/pages', $filename, 'public');
                $testimonial->image = "backend/upload/pages/" . $filename;
            }
            $testimonial->active = $request->active ? true : false;
            $testimonial->save();
        } catch (\Exception $e) {
            Session::flash('error', 'Error: ' . $e->getMessage());
            return back();
        }

        Session::flash('success', 'Testimonial added successfully');
        return back();
    }


    /**
     * Edit home page testimonial section  content.
     */
    public function testimonialEdit($id)
    {
        $testimonial = HomePageTestimonialSection::findOrFail($id);
        return view('backend.pages.home.testimonial.edit', compact('testimonial'));
    }


    /**
     * Update home page testimonial section  content.
     */
    public function testimonialUpdate(request $request, $id)
    {
        //    validation start
        $validate = $request->validate([
            'name' => ['required'],
            'message' => ['required'],
        ]); // end of validation

        try {
            $testimonial = HomePageTestimonialSection::findOrFail($id);
            $testimonial->name = $request->name;
            $testimonial->message = $request->message;

            if ($request->file('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::uuid() . '.' . $extension;
                $filePath = $file->storeAs('backend/upload/pages', $filename, 'public');
                $image = $testimonial->image;

                // Check if the existing image exists using the relative path and delete
                if ($image && Storage::exists('public/' . $image)) {
                    Storage::delete('public/' . $image);
                }
                $testimonial->image = "backend/upload/pages/" . $filename;
            }
            $testimonial->active = $request->active ? true : false;
            $testimonial->save();
        } catch (\Exception $e) {
            Session::flash('error', 'Error: ' . $e->getMessage());
            return back();
        }

        Session::flash('success', 'Testimonial updated successfully');
        return redirect()->route('pages.home.testimonial.index');
    }


    /**
     * Delete home page testimonial section  content.
     */
    public function testimonialDelete($id)
    {
        $testimonial = HomePageTestimonialSection::findOrFail($id);
        if ($testimonial->image && Storage::exists('public/' . $testimonial->image)) {
            Storage::delete('public/' . $testimonial->image);
        }
        $testimonial->delete();
        Session::flash('success', 'Testimonial deleted successfully');
        return back();
    }


    /**
     * Display contact page   content.
     */
    public function contactIndex()
    {
        try {
            return view('backend.pages.home.contact.index');
        } catch (\Exception $e) {
            Session::flash('error', 'Error: ' . $e->getMessage());
            return back();
        }
    }


    /**
     * Update or create contact page   content.
     */
    public function contactUpdate(Request $request)
    {
        //    validation start
        $validate = $request->validate([
            'heading' => ['required'],
            'description' => ['required'],
        ]); // end of validation

        try {
            HomePageContactSection::updateOrCreate(['name' => 'heading'], ['value' => $request->heading]);
            HomePageContactSection::updateOrCreate(['name' => 'description'], ['value' => $request->description]);
        } catch (\Exception $e) {
            Session::flash('error', 'Home page contact section update failed: ' . $e->getMessage());
            return back();
        }

        Session::flash('success', 'Home page contact section updated successfully');
        return back();
    }
}
