<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentGatewayController extends Controller
{
    /**
     * Display paddle payment gateway info page
     */
    public function paddleIndex()
    {
        return view('backend.payment_gateways.paddle');
    }


    /**
     * Update paddle payment data.
     */
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

            $PADDLE_PAYMENT_ACTIVE_STATUS = $request->PADDLE_PAYMENT_ACTIVE ? 'YES' : 'NO';
            overWriteEnvFile('PADDLE_PAYMENT_ACTIVE', $PADDLE_PAYMENT_ACTIVE_STATUS);

            return back()->with('success', 'Paddle info updated');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }


    /**
     * Display stripe payment gateway info page
     */
    public function stripeIndex()
    {
        return view('backend.payment_gateways.stripe');
    }


    /**
     * Update stripe payment data.
     */
    public function stripeUpdate(Request $request)
    {
        try {
            $request->validate([
                'STRIPE_KEY' => 'required',
                'STRIPE_SECRET' => 'required'
            ]);

            overWriteEnvFile('STRIPE_KEY', $request->STRIPE_KEY);
            overWriteEnvFile('STRIPE_SECRET', $request->STRIPE_SECRET);

            $STRIPE_PAYMENT_ACTIVE_STATUS = $request->STRIPE_PAYMENT_ACTIVE ? 'YES' : 'NO';
            overWriteEnvFile('STRIPE_PAYMENT_ACTIVE', $STRIPE_PAYMENT_ACTIVE_STATUS);

            return back()->with('success', 'Stripe info updated');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }


    /**
     *Display paypal payment gateway info page
     */
    public function paypalIndex()
    {
        return view('backend.payment_gateways.paypal');
    }


    /**
     * Update stripe paypal data.
     */
    public function paypalUpdate(Request $request)
    {
        try {
            // return $request->all();

            if ($request->PAYPAL_MODE == true) {
                $request->validate([
                    'PAYPAL_LIVE_CLIENT_ID' => 'required',
                    'PAYPAL_LIVE_CLIENT_SECRET' => 'required'
                ]);

                overWriteEnvFile('PAYPAL_LIVE_CLIENT_ID', $request->PAYPAL_LIVE_CLIENT_ID);
                overWriteEnvFile('PAYPAL_LIVE_CLIENT_SECRET', $request->PAYPAL_LIVE_CLIENT_SECRET);

                $PAYPALPAYMENT_ACTIVE_STATUS = $request->PAYPAL_PAYMENT_ACTIVE ? 'YES' : 'NO';
                overWriteEnvFile('PAYPAL_PAYMENT_ACTIVE', $PAYPALPAYMENT_ACTIVE_STATUS);
            } else {
                $request->validate([
                    'PAYPAL_SANDBOX_CLIENT_ID' => 'required',
                    'PAYPAL_SANDBOX_CLIENT_SECRET' => 'required'
                ]);

                overWriteEnvFile('PAYPAL_SANDBOX_CLIENT_ID', $request->PAYPAL_SANDBOX_CLIENT_ID);
                overWriteEnvFile('PAYPAL_SANDBOX_CLIENT_SECRET', $request->PAYPAL_SANDBOX_CLIENT_SECRET);

                $PAYPALPAYMENT_ACTIVE_STATUS = $request->PAYPAL_PAYMENT_ACTIVE ? 'YES' : 'NO';
                overWriteEnvFile('PAYPAL_PAYMENT_ACTIVE', $PAYPALPAYMENT_ACTIVE_STATUS);
            }

            return redirect()->route('payment.paypal.index')->with('success', 'Paypal info updated');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
