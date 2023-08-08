<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\PrivacyPolicyPage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PrivacyPolicyPageController extends Controller
{
    public function index()
    {
        return view('backend.pages.privacy_policy.index');
    }


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
