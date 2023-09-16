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


    public function update(Request $request, User $user)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'address' => 'required|string',
            ]);
            $updateUser =  $user->findOrFail($request->input('user_id'));
            if ($updateUser) {
                $updateUser->update([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'address' => $request->input('address'),
                ]);
                return redirect()->route('user.index')->with('success', 'User updated successfully');
            } else {
                return redirect()->route('user.index')->with('error', 'No user found');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
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

        Session::flash('success', 'profile updated successfully');
        return back();
    }


    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back();
    }
}
