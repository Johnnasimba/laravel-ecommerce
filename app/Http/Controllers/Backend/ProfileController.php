<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;

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
           'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,svg', 'max:2048'],
       ]);

        $user = auth()->user();

        if($request->hasFile('image')) {
            if(File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }
            $image = $request->file('image');
            $imageName = time() . rand() . '_' .
                $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);

            $path = '/uploads/' . $imageName;
            $user->image = $path;
        }

         $user->name = $request->name;
         $user->email = $request->email;
         $user->save();

         return redirect()->back()->with('success', 'Profile updated successfully');

    }
}
