<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('frontend.components.myAccount.order');
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

    
}
