<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
    }

    public function updateProfile(Request $request)
    {
       $request->validate([
           'name' => ['required', 'max:100'],
           'email' => ['required', 'email', 'unique:users,email,'.auth()->id()],
       ]);

         $user = auth()->user();
         $user->name = $request->name;
         $user->email = $request->email;
         $user->save();

         return redirect()->back()->with('success', 'Profile updated successfully');

    }
}
