<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('backend.user.index');
    }


    public function profile(){
        $auth_user = User::where('id', Auth::user()->id)->first();
        return view('backend.user.profile.index', compact('auth_user'));
    }
}
