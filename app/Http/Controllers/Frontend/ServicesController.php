<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Service;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    public function categoryWiseServiceShow($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $services = Service::where('category_id', $category->id)->where('active', true)->get();

        return view('frontend.category_wise_services', compact('services', 'category'));
    }
}
