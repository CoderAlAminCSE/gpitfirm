<?php

namespace App\Http\Controllers\Backend;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsletterController extends Controller
{
    public function index(Request $request, Newsletter $newsletter)
    {
        try {
            if ($request->has('search') && $request->search != null) {
                $search =  $request->search;
                $newsletters = $newsletter->where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', '%' . $search . '%')
                        ->orWhere('email', 'LIKE', '%' . $search . '%');
                })->paginate(10);
            } else {
                $newsletters = $newsletter->latest()->paginate(10);
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
        return view('backend.newsletter.index', compact('newsletters'));
    }


    public function delete($id, Newsletter $newsletter)
    {
        $newsletter = $newsletter->findOrFail($id);
        $newsletter->delete();
        return back();
    }
}
