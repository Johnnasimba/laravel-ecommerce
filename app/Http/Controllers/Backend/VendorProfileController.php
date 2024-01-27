<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;

class VendorProfileController extends Controller
{
    public function index()
    {
        return view('vendor.dashboard.profile');
    }
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email,'.auth()->id()],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,svg', 'max:2048'],
        ]);


        $user = Auth()->user();
        $user->name = $request->name;
        $user->email = $request->email;

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

        $user->save();

        toastr()->success('Profile updated successfully');
        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $request->user()->update([
            'password' => bcrypt($request->password),
        ]);

        toastr()->success('Password updated successfully');
        return redirect()->back();
    }
}
