<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
}
