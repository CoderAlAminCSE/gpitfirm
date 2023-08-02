<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(Request $request)
    {
        try {
            if ($request->has('search') && $request->search != null) {
                $search =  $request->search;
                $users = User::where(function ($query) use ($search) {
                    $query->where('id', 'LIKE', '%' . $search . '%')
                        ->orWhere('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('email', 'LIKE', '%' . $search . '%');
                })->paginate(10);
                return view('backend.user.index', compact('users'));
            } else {
                $users = User::latest()->paginate(10);
                return view('backend.user.index', compact('users'));
            }
        } catch (\Exception $e) {
            Session::flash('error', 'Error: ' . $e->getMessage());
            return back();
        }
    }


    public function profile()
    {
        $auth_user = User::where('id', Auth::user()->id)->first();
        return view('backend.user.profile.index', compact('auth_user'));
    }


    public function profileUpdate(Request $request)
    {
        try {
            $auth_user = User::where('id', Auth::user()->id)->first();
            $auth_user->name = $request->name;
            $auth_user->email = $request->email;
            // Save if there is an image
            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = time() . $file->getClientOriginalName();
                $file->move(public_path('assets/backend/upload/profile/'), $filename);
                $previousImage = $auth_user->image;
                // Check if the previous image exists then delete it
                if ($previousImage) {
                    if (file_exists(public_path($previousImage))) {
                        unlink(public_path($previousImage));
                    }
                }
                $auth_user->image = "assets/backend/upload/profile/" . $filename;
            }
            $auth_user->save();
        } catch (\Exception $e) {
            Session::flash('error', 'Profile update failed: ' . $e->getMessage());
            return back();
        }

        return back();
    }


    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back();
    }
}
