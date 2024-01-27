<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function profile()
    {
        return view('frontend.dashboard.profile');
    }
}
