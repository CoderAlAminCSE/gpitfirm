<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefundPage;
use Illuminate\Support\Facades\Session;

class RefundPageController extends Controller
{
    /**
     * Display refund page content.
     */
    public function index()
    {
        return view('backend.pages.refund.index');
    }


    /**
     * Update or create refund page content.
     */
    public function update(Request $request, RefundPage $refundPage)
    {
        $request->validate([
            'content' => 'required',
        ]);

        try {
            $refundPage->updateOrCreate(['name' => 'content'], ['value' => $request->content]);
            return back()->with('success', 'Refund page content updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
        return back();
    }
}
