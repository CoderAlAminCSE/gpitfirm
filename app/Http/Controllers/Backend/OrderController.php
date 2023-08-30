<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\User;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\Service;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Srmklive\PayPal\Services\Paypal as PaypPalClinet;

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
     * Show order details.
     */
    public function orderShow($id, Order $order)
    {
        $order = $order->with('items')->with('user')->findOrfail($id);
        return view('backend.order.show', compact('order'));
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
                $invoices = $invoice->with('order')->latest()->paginate(10);
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
        $invoice = Invoice::with('order', 'order.items', 'user')->findOrFail($id);
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
        try {
            DB::beginTransaction();

            if ($request->existingCustomr) {
                $request->validate([
                    'customerId' => 'required',
                ]);
                $user_id = $request->customerId;
            } else {
                $request->validate([
                    'name' => 'required',
                    'email' => 'required',
                    'address' => 'required',
                    'password' => 'required',
                ]);
                $user = new User;
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->address = $request->input('address');
                $user->type = 'customer';
                $user->password = bcrypt($request->input('password'));
                $user->save();
                $user_id = $user->id;
            }

            $latestOrder = Order::latest('id')->first();
            if ($latestOrder) {
                $orderNumber = intval(substr($latestOrder->order_number, 4)) + 1;
            } else {
                $orderNumber = 1;
            }
            $formattedOrderNumber = 'ord-' . str_pad($orderNumber, 6, '0', STR_PAD_LEFT);

            $order = new Order;
            $order->order_number = $formattedOrderNumber;
            $order->user_id = $user_id;
            $order->order_type = 'invoice';
            $order->payment_status = false;
            $order->save();

            if ($request->existingService) {
                $totalAmount = 0;
                foreach ($request->products as $serviceId) {
                    $product = Service::find($serviceId);

                    if ($product) {
                        $totalAmount += $product->price;
                        $orderItem = new OrderItem([
                            'order_id' => $order->id,
                            'service_id' => $serviceId,
                        ]);
                        $orderItem->save();
                    }
                }
                $order->total_amount = $totalAmount;
                $order->save();
            } else {
                $totalAmount = 0;
                foreach ($request->custom_service_name as $index => $serviceName) {
                    $serviceDescription = $request->custom_service_description[$index];
                    $servicePrice = $request->custom_service_price[$index];

                    $orderItem = new OrderItem([
                        'order_id' => $order->id,
                        'custom_service_name' => $serviceName,
                        'custom_service_description' => $serviceDescription,
                        'custom_service_price' => $servicePrice,
                    ]);
                    $orderItem->save();
                    $totalAmount += $servicePrice;
                }
                $order->total_amount = $totalAmount;
                $order->save();
            }

            $latestInvoice = Invoice::latest('id')->first();
            if ($latestInvoice) {
                $invoiceNumber = intval(substr($latestInvoice->invoice_number, 4)) + 1;
            } else {
                $invoiceNumber = 1;
            }
            $formattedInvoiceNumber = 'inv-' . str_pad($invoiceNumber, 6, '0', STR_PAD_LEFT);

            $invoice = new Invoice([
                'invoice_number' => $formattedInvoiceNumber,
                'user_id' => $order->user_id,
                'order_id' => $order->id,
                'link' => Crypt::encrypt($formattedInvoiceNumber),
            ]);
            $invoice->save();

            DB::commit();
            return redirect()->route('invoice.index')->with('success', 'Invoice generated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }


    public function invoiceShowForCustomer($encryptedInvoice, Invoice $invoice)
    {
        $decryptedInvoiceNumber = Crypt::decrypt($encryptedInvoice);
        $invoice = Invoice::with('order', 'user', 'order.items')->where('invoice_number', $decryptedInvoiceNumber)->first();
        if ($invoice) {
            return view('frontend.components.invoice.invoice', compact('invoice'));
        }
    }


    public function invoicePaymentConfirm(Request $request)
    {
        $invoice = Invoice::where('id', $request->invoice_id)->first();
        $order = Order::where('id', $invoice->order_id)->first();

        if ($invoice) {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $payment =  Charge::create([
                'amount' => 100 * $order->total_amount,
                'currency' => 'usd',
                'source' => $request->stripeToken,
                "description" => "This payment is tested purpose",
            ]);

            if ($payment->status === 'succeeded') {
                $order->payment_status = true;
                $order->payment_method = 'stripe';
                $order->paid_at = Carbon::now();
                $order->save();
                return back();
            }
        }
    }


    /**
     * this function make payments 
     */
    public function processPaypal(Request $request)
    {
        $invoice = Invoice::with('order', 'order.items')->where('id', $request->invoice_id)->first();

        if ($invoice) {
            session(['invoice_for_paypal' => $invoice]);
            $provider = new PaypPalClinet();
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();

            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('invoice.processSuccess'),
                    "cancel_url" => route('invoice.processCancel'),
                ],
                "purchase_units" => [
                    0 => [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => $invoice->order->total_amount
                        ]
                    ]
                ]
            ]);

            if (isset($response['id']) && $response['id'] != null) {
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }

                return back()->with('error', 'Something went wrong!');
            } else {
                return back()->with('error', 'Something went wrong!');
            }
        }
    }


    public function processSuccess(Request $request)
    {
        $provider = new PaypPalClinet();
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            $retrievedInvoice = session('invoice_for_paypal');
            $orderID = $retrievedInvoice->order_id;

            $order = Order::findOrFail($orderID);
            $order->payment_status = true;
            $order->payment_method = 'paypal';
            $order->paid_at = Carbon::now();
            $order->save();

            session()->forget('invoice_for_paypal');
            return redirect()->route('frontenc.index');
        } else {
            return $response['message'];
        }
    }


    public function ProcessCancel(Request $request)
    {
        session()->forget('invoice_for_paypal');
        return back()->with('error', 'You have cancelled your transaction');
    }
}
