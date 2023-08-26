<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPassVerifyCodeMail;

class AccountController extends Controller
{
    /**
     * Display the customer account dashboard page content.
     */
    public function myAccount()
    {
        return view('frontend.components.myAccount.info');
    }


    /**
     * Display the customer account orders page content.
     */
    public function orderIndex()
    {
        $orders = Order::with('items')->where('user_id', Auth::user()->id)->get();
        return view('frontend.components.myAccount.order', compact('orders'));
    }


    /**
     * Display the customer account orders details content.
     */
    public function orderDetails($order_number)
    {
        $order = Order::with('items')->where('order_number', $order_number)->first();
        return view('frontend.components.myAccount.order_details', compact('order'));
    }


    /**
     * Cancel order from admin
     */
    public function orderCancel($id, Order $order)
    {
        $order = $order->findOrFail($id);
        $order->canceled_at = Carbon::now();
        $order->save();
        return back();
    }


    /**
     * Display the customer account download page content.
     */
    public function downloadIndex()
    {
        return view('frontend.components.myAccount.download');
    }


    /**
     * Display the customer account details content.
     */
    public function accountDetails()
    {
        return view('frontend.components.myAccount.account_details');
    }


    /**
     * Update the customer account details
     */
    public function accountUpdate(Request $request, User $user, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $updated_user = $user->findOrFail($id);
        if ($request->fname) {
            $updated_user->fname = $request->fname;
        }

        if ($request->lname) {
            $updated_user->lname = $request->lname;
        }

        if ($request->name) {
            $updated_user->name = $request->name;
        }

        if ($request->email) {
            $updated_user->email = $request->email;
        }

        $updated_user->save();
        return back();
    }


    /**
     * forget password page redirect
     */
    public function forgotPassEmailVerificationPage()
    {
        return view('auth.forgot_pass_emailverify');
    }


    public function forgotPassVerificationPage(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $verifyCode = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
            $user->verification_code = $verifyCode;
            $user->save();

            $details = [
                'code' => $verifyCode,
            ];

            Mail::to($request->email)->send(new ForgotPassVerifyCodeMail($details));

            return view('auth.fotgot_pass_verify_page', compact('user'));
        } else {
            return back();
        }
    }


    public function verifiyVerificationCode(Request $request)
    {
        $user = User::where('id', $request->user)->first();
        if ($user->verification_code == $request->code) {
            return view('auth.forgot_pass_newpass', compact('user'));
        } else {
            return "some thing went wrong";
        }
    }


    public function forgotPassNewPassStore(Request $request)
    {
        $user = User::where('id', $request->user)->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('login');
        } else {
            return "some thing went wrong";
        }
    }
}
