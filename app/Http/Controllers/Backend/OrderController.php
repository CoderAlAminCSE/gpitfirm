<?php

namespace App\Http\Controllers\Backend;

use PDF;
use Carbon\Carbon;
use Stripe\Charge;
use Stripe\Stripe;
use App\Models\User;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\Service;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Mail\InvoiceReminderMail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
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
     *  Order report
     */
    public function orderReport(Request $request, Order $order)
    {
        try {
            if ($request->has('time_range') && $request->time_range != null) {
                $timeRange = $request->get('time_range');
                $orders = getOrdersReportBasedOnTimeRange($timeRange);
            } else {
                $orders = $order->with('invoice')->latest()->paginate(10);
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
        return view('backend.order.report', compact('orders'));
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
     * Edit invoice.
     */
    public function invoiceEdit($id, Invoice $invoice)
    {
        $invoice = $invoice->with('order', 'order.items', 'user')->findOrfail($id);
        $total_price = 0;
        $custom_service = '';
        foreach ($invoice->order->items as $item) {
            if ($item->service_id != null) {
                $total_price += serviceInfo($item->service_id)->price;
                $custom_service = 'NO';
            } else {
                $total_price += $item->custom_service_price;
                $custom_service = 'YES';
            }
        }
        $totalPriceFormatted = number_format($total_price, 2);

        return view('backend.invoice.edit', compact('invoice', 'totalPriceFormatted', 'custom_service'));
    }


    /**
     * Update invoice.
     */
    public function invoiceUpdate(Request $request, $id, Invoice $invoice, Order $order)
    {
        // return $request->all();

        try {
            $invoice = $invoice->findOrFail($id);
            if ($invoice) {
                DB::beginTransaction();

                $request->validate([
                    'email' => 'required',
                ]);

                $updateOrder = $order->findOrFail($invoice->order_id);
                if ($updateOrder) {
                    $updateOrder->items()->delete();
                    $user = User::where('email', $request->email)->first();

                    if (!$user) {
                        $request->validate([
                            'email' => 'required',
                        ]);

                        $user = new User;
                        $user->type = 'customer';
                    }

                    // Update user information
                    $user->name = $request->name;
                    $user->business_name = $request->business_name;
                    $user->email = $request->email;
                    $user->address = $request->address;

                    // Handle password update
                    $password = $request->input('password', null);
                    $user->password = $password ? bcrypt($password) : '$2y$10$2dXuJopzVDaHsxTTVl.CZexCjLpOG.Im5ncG8XV53ZAQoKlif69iS';

                    $user->save();
                    $user_id = $user->id;
                    $updateOrder->user_id = $user_id;
                    $updateOrder->save();
                } else {
                    return redirect()->route('invoice.index')->with('Error', 'Order not found');
                }

                if ($request->existingService) {
                    $totalAmount = 0;
                    foreach ($request->products as $serviceId) {
                        $product = Service::find($serviceId);

                        if ($product) {
                            $totalAmount += $product->price;
                            $orderItem = new OrderItem([
                                'order_id' => $updateOrder->id,
                                'service_id' => $serviceId,
                            ]);
                            $orderItem->save();
                        }
                    }
                    $updateOrder->total_amount = $totalAmount;
                    $updateOrder->save();
                } else {
                    $totalAmount = 0;
                    foreach ($request->custom_service_name as $index => $serviceName) {
                        $serviceDescription = $request->custom_service_description[$index];
                        $servicePrice = $request->custom_service_price[$index];

                        $orderItem = new OrderItem([
                            'order_id' => $updateOrder->id,
                            'custom_service_name' => $serviceName,
                            'custom_service_description' => $serviceDescription,
                            'custom_service_price' => $servicePrice,
                        ]);
                        $orderItem->save();
                        $totalAmount += $servicePrice;
                    }
                    $updateOrder->total_amount = $totalAmount;
                    $updateOrder->save();
                }

                $invoice->user_id = $user_id;
                $invoice->custom_order_number = $request->custom_order_number;
                $invoice->notes = $request->notes;
                $invoice->save();

                DB::commit();
                return redirect()->route('invoice.index')->with('success', 'Invoice updated successfully');
            } else {
                return redirect()->route('invoice.index')->with('Error', 'Invoice not found');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong, please try again');
        }
    }


    /**
     * pending invoice list.
     */
    public function invoicePending(Request $request, Invoice $invoice)
    {
        try {
            if ($request->has('search') && $request->search != null) {
                $search =  $request->search;
                $invoices = $invoice->where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', '%' . $search . '%')
                        ->orWhere('invoice_number', 'LIKE', '%' . $search . '%');
                })->paginate(10);
            } else {
                $invoices = $invoice->with('order')->whereHas('order', function ($query) {
                    $query->where('payment_status', 0)->whereNull('canceled_at');
                })->paginate(10);
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
        return view('backend.invoice.pending', compact('invoices'));
    }


    /**
     * Paid invoice list
     */
    public function invoicePaid(Request $request, Invoice $invoice)
    {
        try {
            if ($request->has('search') && $request->search != null) {
                $search =  $request->search;
                $invoices = $invoice->where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', '%' . $search . '%')
                        ->orWhere('invoice_number', 'LIKE', '%' . $search . '%');
                })->paginate(10);
            } else {
                $invoices = $invoice->with('order')->whereHas('order', function ($query) {
                    $query->where('payment_status', 1);
                })->paginate(10);
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
        return view('backend.invoice.paid', compact('invoices'));
    }


    /**
     * Paid invoice list
     */
    public function invoiceCanceled(Request $request, Invoice $invoice)
    {
        try {
            if ($request->has('search') && $request->search != null) {
                $search =  $request->search;
                $invoices = $invoice->where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', '%' . $search . '%')
                        ->orWhere('invoice_number', 'LIKE', '%' . $search . '%');
                })->paginate(10);
            } else {
                $invoices = $invoice->with('order')->whereHas('order', function ($query) {
                    $query->where('payment_status', 0)->whereNotNull('canceled_at');
                })->paginate(10);
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
        return view('backend.invoice.canceled', compact('invoices'));
    }




    /**
     * Show invoice generate page.
     */
    public function invoiceGenerate()
    {
        return view('backend.invoice.generate');
    }


    /**
     * get input email list if available
     */
    public function invoiceCheckEmail(Request $request)
    {
        $email = $request->input('email');

        // Query the database to check for matching emails
        $user = User::where('email', 'like', '%' . $email . '%')->get();

        return response()->json(['user' => $user]);
    }

    /**
     * Store invoice.
     */
    public function invoiceStore(Request $request, Invoice $invoice)
    {
        try {
            // return $request->all();
            DB::beginTransaction();

            if ($request->userId) {
                $user = User::findOrFail($request->userId);
                $user->name = $request->name;
                $user->business_name = $request->business_name;
                $user->email = $request->email;
                $user->address = $request->address;
                if ($request->input('password')) {
                    $user->password = bcrypt($request->input('password'));
                } else {
                    $user->password = '$2y$10$2dXuJopzVDaHsxTTVl.CZexCjLpOG.Im5ncG8XV53ZAQoKlif69iS';
                }
                $user->save();
                $user_id = $user->id;
            } else {
                $request->validate([
                    'email' => 'required',
                ]);
                $user = new User;
                $user->name = $request->input('name');
                $user->business_name = $request->input('business_name');
                $user->email = $request->input('email');
                $user->address = $request->input('address');
                $user->type = 'customer';
                if ($request->input('password')) {
                    $user->password = bcrypt($request->input('password'));
                } else {
                    $user->password = '$2y$10$2dXuJopzVDaHsxTTVl.CZexCjLpOG.Im5ncG8XV53ZAQoKlif69iS';
                }
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
                if ($request->has('products') && $request->products[0] !== null) {
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
                    return back()->with('error', 'Please select a service');
                }
            } else {
                if ($request->has('custom_service_name') && $request->custom_service_name[0] != null) {
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
                } else {
                    return back()->with('error', 'Please select a service');
                }
            }

            $latestInvoice = Invoice::latest('id')->first();
            if ($latestInvoice) {
                $invoiceNumber = intval(substr($latestInvoice->invoice_number, 4)) + 1;
            } else {
                $invoiceNumber = 1;
            }
            $formattedInvoiceNumber = 'inv-' . str_pad($invoiceNumber, 6, '0', STR_PAD_LEFT);
            $encryptedInvoiceNumber = encryptInvoiceNumber($formattedInvoiceNumber);

            $invoice = new Invoice([
                'invoice_number' => $formattedInvoiceNumber,
                'user_id' => $order->user_id,
                'order_id' => $order->id,
                'custom_order_number' => $request->custom_order_number,
                'link' => $encryptedInvoiceNumber,
                'notes' => $request->input('notes'),
            ]);
            $invoice->save();

            DB::commit();
            return redirect()->route('invoice.index')->with('success', 'Invoice generated successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Something went wrong, please try again');
        }
    }


    /**
     * Send invoice reminder.
     */
    public function invoiceReminder($id, Invoice $invoice, User $user)
    {
        try {
            $invoice = $invoice->with('order', 'user', 'order.items')->findOrFail($id);
            $details = [
                'from' => env('MAIL_FROM_ADDRESS'),
                'subject' => siteSetting('company_name') . ' - Complete your order',
                'company_phone' => siteSetting('company_phone'),
                'company_website' => siteSetting('company_website'),
                'company_name' => siteSetting('company_name'),
            ];

            $receiver = $user->where('id', $invoice->user->id)->first();
            if ($receiver) {
                Mail::to($receiver->email)->send(new InvoiceReminderMail($details, $invoice));
                return back()->with('success', 'Invoice reminder sent successfully');
            } else {
                return back()->with('error', 'Receiver email not found');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }


    /**
     * Show invoice for copy link.
     */
    public function invoiceShowForCustomer($encryptedInvoice, Invoice $invoice)
    {
        $decryptedInvoiceNumber = decryptInvoiceNumber($encryptedInvoice);
        $invoice = Invoice::with('order', 'user', 'order.items')->where('invoice_number', $decryptedInvoiceNumber)->first();
        if ($invoice) {
            return view('frontend.components.invoice.invoice', compact('invoice', 'encryptedInvoice'));
        } else {
            return redirect()->route('frontenc.index');
        }
    }


    /**
     * Download invoice for customer.
     */
    public function invoiceDownloadForCustomer($id, Invoice $invoice)
    {
        $invoice = $invoice->with('order', 'user', 'order.items')->findOrFail($id);

        $details = [
            'company_phone' => siteSetting('company_phone'),
            'company_website' => siteSetting('company_website'),
            'company_name' => siteSetting('company_name'),
            'company_email' => siteSetting('company_email'),
            'company_address' => siteSetting('company_address'),
            'invoice' => $invoice,
        ];
        $pdf = PDF::loadView('backend.invoice.pdf', $details);
        return $pdf->download('invoice.pdf');
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

            $encryptedInvoice = $request->encryptedInvoice;
            $invoiceUrl = route('customer.invoice.show', ['encryptedInvoice' => $encryptedInvoice]);
            session(['invoiceUrl' => $invoiceUrl]);

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

                return Redirect::to($invoiceUrl)->with('error', 'Something went wrong!');
            } else {
                return Redirect::to($invoiceUrl)->with('error', 'Something went wrong!');
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

            $invoiceUrl = session('invoiceUrl');

            $order = Order::findOrFail($orderID);
            $order->payment_status = true;
            $order->payment_method = 'paypal';
            $order->paid_at = Carbon::now();
            $order->save();

            session()->forget('invoiceUrl');
            session()->forget('invoice_for_paypal');
            return Redirect::to($invoiceUrl)->with('success', 'Payment successful!');
        } else {
            return $response['message'];
        }
    }


    public function ProcessCancel(Request $request)
    {
        $invoiceUrl = session('invoiceUrl');
        session()->forget('invoice_for_paypal');
        return Redirect::to($invoiceUrl)->with('error', 'You have cancelled the payment!');
    }
}
