<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\TermsConditionPage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TermsConditionPageConrtoller extends Controller
{
    public function index()
    {
        return view('backend.pages.terms_condition.index');
    }

    public function update(Request $request)
    {
        try {
            TermsConditionPage::updateOrCreate(['name' => 'content'], ['value' => $request->content]);
        } catch (\Exception $e) {
            Session::flash('error', 'Error: ' . $e->getMessage());
            return back();
        }
        Session::flash('success', 'Reseller rules page content updated successfully');
        return back();
    }
}
