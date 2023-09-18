<?php

namespace App\Http\Controllers\Backend;

use App\Models\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class SitesController extends Controller
{
    public function index(Request $request)
    {
        try {
            if ($request->has('search') && $request->search != null) {
                $search =  $request->search;
                $sites = Site::where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', '%' . $search . '%')
                        ->orWhere('website_name', 'LIKE', '%' . $search . '%')
                        ->orWhere('da', 'LIKE', '%' . $search . '%')
                        ->orWhere('pa', 'LIKE', '%' . $search . '%')
                        ->orWhere('dr', 'LIKE', '%' . $search . '%')
                        ->orWhere('traffic', 'LIKE', '%' . $search . '%');
                })->paginate(10);
            } else {
                $sites = Site::latest()->paginate(10);
            }
        } catch (\Exception $e) {
            Session::flash('error', 'Error: ' . $e->getMessage());
            return back();
        }
        return view('backend.site.index', compact('sites'));
    }


    public function create(Request $request)
    {
        // validation start
        $validate = $request->validate([
            'website_name' => ['required'],
            'website_url' => ['required'],
            'da' => ['required'],
            'pa' => ['required'],
            'dr' => ['required'],
            'traffic' => ['required'],
            'category' => ['required'],
        ]); // end of validation

        try {
            $site = new Site();
            $site->website_name = $request->website_name;
            $site->website_url = $request->website_url;
            $site->da = $request->da;
            $site->pa = $request->pa;
            $site->dr = $request->dr;
            $site->traffic = $request->traffic;
            $site->category = $request->category;
            $site->google_news = $request->google_news ? true : false;
            $site->active = $request->active ? true : false;
            $site->save();
        } catch (\Exception $e) {
            Session::flash('error', 'Error: ' . $e->getMessage());
            return back();
        }
        Session::flash('success', 'Site created successfully');
        return back();
    }


    public function edit($id)
    {
        $site = Site::findOrFail($id);
        return view('backend.site.edit', compact('site'));
    }


    public function update(Request $request, $id)
    {
        // validation start
        $validate = $request->validate([
            'website_name' => ['required'],
            'website_url' => ['required'],
            'da' => ['required'],
            'pa' => ['required'],
            'dr' => ['required'],
            'traffic' => ['required'],
            'category' => ['required'],
        ]); // end of validation

        try {
            $site = Site::findOrFail($id);
            $site->website_name = $request->website_name;
            $site->website_url = $request->website_url;
            $site->da = $request->da;
            $site->pa = $request->pa;
            $site->dr = $request->dr;
            $site->traffic = $request->traffic;
            $site->category = $request->category;
            $site->google_news = $request->google_news ? true : false;
            $site->active = $request->active ? true : false;
            $site->save();
        } catch (\Exception $e) {
            Session::flash('error', 'Error: ' . $e->getMessage());
            return back();
        }
        Session::flash('success', 'Site updated successfully');
        return redirect()->route('sites.index');
    }


    public function delete($id)
    {
        $site = Site::findOrFail($id);
        $site->delete();
        return back();
    }


    public function shortableindex()
    {
        $sites = Site::orderBy('order', 'ASC')->get();

        return view('backend.site.shorting', compact('sites'));
    }


    public function shortableUpdate(Request $request)
    {
        $sites = Site::all();

        foreach ($sites as $site) {
            foreach ($request->order as $order) {
                if ($order['id'] == $site->id) {
                    $site->update(['order' => $order['position']]);
                }
            }
        }

        return response('Update Successfully.', 200);
    }
}
