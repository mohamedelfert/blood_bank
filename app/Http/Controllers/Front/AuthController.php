<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function signup()
    {
        $settings = Setting::first();
        return view('front.signup',compact('settings'));
    }

    public function signin()
    {
        $settings = Setting::first();
        return view('front.signin',compact('settings'));
    }
}
