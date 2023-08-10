<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    /**
     * Category wise service show.
     */
    public function categoryWiseServiceShow($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $services = Service::where('category_id', $category->id)->where('active', true)->get();

        return view('frontend.category_wise_services', compact('services', 'category'));
    }


    /**
     * Single service show.
     */
    public function singleServiceShow($slug)
    {
        $service = Service::with('category')->where('slug', $slug)->first();
        return view('frontend.single_product', compact('service',));
    }
}
