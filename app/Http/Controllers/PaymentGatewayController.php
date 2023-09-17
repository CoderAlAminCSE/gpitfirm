<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentGatewayController extends Controller
{
    public function paddleIndex()
    {
        return view('backend.payment_gateways.paddle');
    }


    public function paddleUpdate(Request $request)
    {
        try {

            $request->validate([
                'PADDLE_VENDOR_ID' => 'required',
                'PADDLE_VENDOR_AUTH_CODE' => 'required',
                'PADDLE_PUBLIC_KEY' => 'required'
            ]);

            overWriteEnvFile('PADDLE_VENDOR_ID', $request->PADDLE_VENDOR_ID);
            overWriteEnvFile('PADDLE_VENDOR_AUTH_CODE', $request->PADDLE_VENDOR_AUTH_CODE);
            overWriteEnvFile('PADDLE_PUBLIC_KEY', $request->PADDLE_PUBLIC_KEY);

            return back()->with('success', 'Paddle info updated');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }


    public function stripeIndex()
    {
        return view('backend.payment_gateways.stripe');
    }


    public function stripeUpdate(Request $request)
    {
        try {

            $request->validate([
                'STRIPE_KEY' => 'required',
                'STRIPE_SECRET' => 'required'
            ]);

            overWriteEnvFile('STRIPE_KEY', $request->STRIPE_KEY);
            overWriteEnvFile('STRIPE_SECRET', $request->STRIPE_SECRET);

            return back()->with('success', 'Stripe info updated');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }


    public function paypalIndex()
    {
        return view('backend.payment_gateways.paypal');
    }


    public function paypalUpdate(Request $request)
    {
        try {

            $request->validate([
                'PAYPAL_SANDBOX_CLIENT_ID' => 'required',
                'PAYPAL_SANDBOX_CLIENT_SECRET' => 'required'
            ]);

            overWriteEnvFile('PAYPAL_SANDBOX_CLIENT_ID', $request->PAYPAL_SANDBOX_CLIENT_ID);
            overWriteEnvFile('PAYPAL_SANDBOX_CLIENT_SECRET', $request->PAYPAL_SANDBOX_CLIENT_SECRET);

            return redirect()->route('payment.paypal.index')->with('success', 'Paypal info updated');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
