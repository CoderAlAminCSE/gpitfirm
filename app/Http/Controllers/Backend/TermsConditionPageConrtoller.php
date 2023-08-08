<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\TermsConditionPage;
use App\Http\Controllers\Controller;

class TermsConditionPageConrtoller extends Controller
{
    /**
     * Display the terms and conditions page.
     */
    public function index()
    {
        return view('backend.pages.terms_condition.index');
    }


    /**
     * Update or create the terms and conditions page content.
     */
    public function update(Request $request, TermsConditionPage $termsConditionPage)
    {
        $request->validate([
            'content' => 'required',
        ]);

        try {
            $termsConditionPage->updateOrCreate(['name' => 'content'], ['value' => $request->content]);
            return back()->with('success', 'Terms and conditions page content updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
        return back();
    }
}
