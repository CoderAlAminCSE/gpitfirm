<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RefundPage;
use Illuminate\Support\Facades\Session;

class RefundPageController extends Controller
{
    public function index()
    {
        return view('backend.pages.refund.index');
    }

    public function update(Request $request)
    {
        // return $request->all();
        try {
            RefundPage::updateOrCreate(['name' => 'content'], ['value' => $request->content]);
        } catch (\Exception $e) {
            Session::flash('error', 'Error: ' . $e->getMessage());
            return back();
        }
        Session::flash('success', 'Refund page content updated successfully');
        return back();
    }
}
