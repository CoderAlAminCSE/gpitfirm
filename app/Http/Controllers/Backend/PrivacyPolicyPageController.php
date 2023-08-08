<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\PrivacyPolicyPage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PrivacyPolicyPageController extends Controller
{
    /**
     * Display Privacy policy page content.
     */
    public function index()
    {
        return view('backend.pages.privacy_policy.index');
    }


    /**
     * Update or create Privacy policy page content.
     */
    public function update(Request $request)
    {
        try {
            PrivacyPolicyPage::updateOrCreate(['name' => 'content'], ['value' => $request->content]);
        } catch (\Exception $e) {
            Session::flash('error', 'Error: ' . $e->getMessage());
            return back();
        }
        Session::flash('success', 'Privacy policy page content updated successfully');
        return back();
    }
}
