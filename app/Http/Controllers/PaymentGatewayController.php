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
}
