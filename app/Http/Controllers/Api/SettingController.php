<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::find(1);

        if (!$settings) {
            return responseJson(0, 'عفوا حدث خطأ أثناء عرض الاعدادات');
        }

        return responseJson(1, 'Success', $settings);
    }

    public function update(Request $request, $id)
    {
        $settings = Setting::find($id);

        $rules = [
            'notification_setting_text' => 'required',
            'about_app' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'fb_url' => 'required',
            'tw_url' => 'required',
            'insta_url' => 'required',
        ];
        $validate = Validator::make(request()->all(), $rules);
        if ($validate->fails()) {
            return responseJson(2, $validate->errors());
        }else{
            if (!$settings) {
                return responseJson(0, 'عفوا حدث خطأ أثناء تحديث الاعدادات');
            }

            $updated = $settings->update($request->all());

            if ($updated) {
                return responseJson(1,'تم تحديث الاعدادات بنجاح',$settings);
            } else {
                return responseJson(0,'خطأ أثناء تحديث الاعدادات');
            }
        }

    }
}
