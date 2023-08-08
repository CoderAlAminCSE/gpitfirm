<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\ResellerRulesPage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ResellerRulesPageController extends Controller
{
    /**
     * Display Reseller rules page content.
     */
    public function index()
    {
        return view('backend.pages.reseller_rules.index');
    }


    /**
     * Update or create Reseller rules page content.
     */
    public function update(Request $request, ResellerRulesPage $resellerRules)
    {
        $request->validate([
            'content' => 'required',
        ]);

        try {
            $resellerRules->updateOrCreate(['name' => 'content'], ['value' => $request->content]);
            return back()->with('success', 'Reseller rules page content updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
        return back();
    }
}
