<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display the order index page with searching functionality.
     */
    public function orderIndex(Request $request, Order $order)
    {
        try {
            if ($request->has('search') && $request->search != null) {
                $search =  $request->search;
                $orders = $order->with('invoice')->where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', '%' . $search . '%')
                        ->orWhere('order_number', 'LIKE', '%' . $search . '%');
                })->paginate(10);
            } else {
                $orders = $order->with('invoice')->latest()->paginate(10);
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
        return view('backend.order.index', compact('orders'));
    }


    /**
     * Cancel order from customer account
     */
    public function orderCancel($id, Order $order)
    {
        try {
            $order = $order->findOrFail($id);
            $order->canceled_at = Carbon::now();
            $order->save();
            return back()->with('success', 'order Canceled');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }


    /**
     * Display the order index page with searching functionality.
     */
    public function invoiceIndex(Request $request, Invoice $invoice)
    {
        try {
            if ($request->has('search') && $request->search != null) {
                $search =  $request->search;
                $invoices = $invoice->where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', '%' . $search . '%')
                        ->orWhere('invoice_number', 'LIKE', '%' . $search . '%');
                })->paginate(10);
            } else {
                $invoices = $invoice->latest()->paginate(10);
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
        return view('backend.invoice.index', compact('invoices'));
    }


    /**
     * Show invoice details.
     */
    public function invoiceShow($id, Invoice $invoice)
    {
        $invoice = $invoice->with('order')->with('user')->findOrfail($id);
        return view('backend.invoice.show', compact('invoice'));
    }


    /**
     * Show invoice generate page.
     */
    public function invoiceGenerate()
    {
        return view('backend.invoice.generate');
    }


    /**
     * Store invoice.
     */
    public function invoiceStore(Request $request, Invoice $invoice)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        return $request->all();
    }
}
