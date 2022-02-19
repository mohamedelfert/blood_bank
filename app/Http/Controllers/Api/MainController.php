<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\Category;
use App\Models\City;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Donation;
use App\Models\Governorate;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function governorates()
    {
        $governorates = Governorate::all();
        return responseJson(1, 'Success', $governorates);
    }

    public function governorate($id)
    {
        $governorate = Governorate::find($id);
        return responseJson(1, 'Success', $governorate);
    }

    public function ceties()
    {
        $cities = City::where(function ($query) {
            if (request()->has('governorate_id')) {
                $query->where('governorate_id', request('governorate_id'));
            }
        })->get();
        return responseJson(1, 'Success', $cities);
    }

    public function bloodTypes()
    {
        $blood_types = BloodType::all();
        return responseJson(1, 'Success', $blood_types);
    }

    public function categories()
    {
        $categories = Category::all();
        return responseJson(1, 'Success', $categories);
    }

    public function contacts()
    {
        $contacts = Contact::all();
        return responseJson(1, 'Success', $contacts);
    }

    public function addContacts(Request $request)
    {
        $rules = [
            'subject' => 'required|min:10',
            'message' => 'required|min:10',
        ];
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return responseJson(2, $validate->errors());
        } else {
            $client = Client::where('api_token',$request->api_token)->first();
            if ($client){
                $request->merge(['client_id' => $client->id]);
            }
            $contacts = Contact::create($request->all());
            return responseJson(1, 'تم ارسال الرساله بنجاح', $contacts);
        }
    }

    public function settings()
    {
        $settings = Setting::find(1);

        if (!$settings) {
            return responseJson(0, 'عفوا حدث خطأ أثناء عرض الاعدادات');
        }

        return responseJson(1, 'Success', $settings);
    }

    public function updateSettings(Request $request, $id)
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

    public function donations()
    {
        $donations = Donation::all();
        return responseJson(1, 'Success', $donations);
    }

    public function donationRequest(Request $request)
    {
        $rules = [
            'patient_name' => 'required',
            'patient_phone' => 'required|unique:donations',
            'patient_age' => 'required',
            'blood_type_id' => 'required',
            'city_id' => 'required',
            'client_id' => 'required',
            'bags_num' => 'required',
            'hospital_name' => 'required',
            'hospital_address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'details' => 'required',
        ];
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return responseJson(2, $validate->errors());
        } else {
            $donation = Donation::create($request->all());
            return responseJson(1, 'تم اضافه طلب التبرع بنجاح', $donation);
        }
    }

    public function posts()
    {
        $posts = Post::with('category')->paginate(10);
        return responseJson(1, 'Success', $posts);
    }

    public function listFavourites(Request $request)
    {
        $posts = $request->user()->posts()->paginate();//->toSql();
//        $client = Client::where('api_token',$request->api_token)->first();
//        if ($client){
//            $client_id = $client->id;
//        }
//        $posts = Post::join('client_post','client_post.post_id','=','post_id')->where('client_post.client_id',$client_id)->get();
        return responseJson(1, 'Success', $posts);
    }
}
