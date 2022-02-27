<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $title = trans('main.settings');
        $settings = Setting::findOrFail(1);
        return view('admin.settings.index', compact('title', 'settings'));
    }

    public function update(Request $request)
    {
        $setting = Setting::findOrFail($request->id);
        $setting->notification_setting_text = $request->notification_setting_text;
        $setting->about_app = $request->about_app;
        $setting->phone = $request->phone;
        $setting->email = $request->email;
        $setting->fb_url = $request->facebook;
        $setting->tw_url = $request->twitter;
        $setting->insta_url = $request->instagram;
        $setting->update();

        toastr()->warning(trans('messages.update'));
        return back();
    }
}
