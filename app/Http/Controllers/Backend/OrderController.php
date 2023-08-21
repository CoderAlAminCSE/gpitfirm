<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invoice;

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
                $orders = $order->where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', '%' . $search . '%')
                        ->orWhere('order_number', 'LIKE', '%' . $search . '%');
                })->paginate(10);
            } else {
                $orders = $order->latest()->paginate(10);
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
        return view('backend.order.index', compact('orders'));
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
}
