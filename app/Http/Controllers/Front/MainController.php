<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(9);
        $settings = Setting::first();
        return view('front.index', compact('posts','settings'));
    }

    public function about_us()
    {
        $settings = Setting::first();
        return view('front.about-us', compact('settings'));
    }

    public function about_app()
    {
        $settings = Setting::first();
        return view('front.about-app', compact('settings'));
    }

    public function contact()
    {
        $settings = Setting::first();
        return view('front.contact', compact('settings'));
    }

    public function donation_requests()
    {
        $settings = Setting::first();
        return view('front.donation-requests', compact('settings'));
    }

    public function donation_details()
    {
        $settings = Setting::first();
        return view('front.donation-request-details', compact('settings'));
    }

    public function posts()
    {
        $settings = Setting::first();
        return view('front.posts', compact('settings'));
    }

    public function post()
    {
        $settings = Setting::first();
        return view('front.post-details', compact('settings'));
    }
}
