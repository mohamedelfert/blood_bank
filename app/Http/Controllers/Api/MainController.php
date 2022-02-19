<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\Category;
use App\Models\City;
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
        $contacts = Contact::paginate(10);
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
            $contact = $request->user()->contacts()->create($request->all());
            return responseJson(1, 'تم ارسال الرساله بنجاح', $contact);
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
        } else {
            if (!$settings) {
                return responseJson(0, 'عفوا حدث خطأ أثناء تحديث الاعدادات');
            }

            $updated = $settings->update($request->all());

            if ($updated) {
                return responseJson(1, 'تم تحديث الاعدادات بنجاح', $settings);
            } else {
                return responseJson(0, 'خطأ أثناء تحديث الاعدادات');
            }
        }
    }

    //======================================= Donations =========================================//
    public function donations(Request $request)
    {
//        $donations = Donation::with('city','client','bloodType')->latest()->paginate(10);
//        return responseJson(1, 'Success', $donations);

        $donations = Donation::where(function ($query) use ($request) {
            if ($request->has('governorate_id')) {
                $query->whereHas('city', function ($query) use ($request) {
                    $query->where('governorate_id', $request->governorate_id);
                });
            } elseif ($request->input('city_id')) {
                $query->where('city_id', $request->city_id);
            } elseif ($request->input('blood_type_id')) {
                $query->where('blood_type_id', $request->blood_type_id);
            } elseif ($request->input('client_id')) {
                $query->where('client_id', $request->client_id);
            }
        })->with('city.governorate', 'client', 'bloodType')->latest()->paginate(10);

        return responseJson(1, 'success', $donations);
    }

    public function donation(Request $request)
    {
        $donation = Donation::with('city', 'client', 'bloodType')->find($request->donation_id);
        if (!$donation) {
            return responseJson(0, 'No Donation Found');
        }
//        if ($request->user()->notifications()->where('donation_request_id',$donation->id)->first())
//        {
//            $request->user()->notifications()->updateExistingPivot($donation->notification->id,['is_read' => 1]);
//        }
        return responseJson(1, 'Success', $donation);
    }

    public function donationRequestCreate(Request $request)
    {
        $rules = [
            'patient_name' => 'required',
            'patient_phone' => 'required|digits:11',
            'patient_age' => 'required:digits',
            'blood_type_id' => 'required|exists:blood_types,id',
            'city_id' => 'required|exists:cities,id',
            'bags_num' => 'required:digits',
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
            $donation = $request->user()->donations()->create($request->all());
            return responseJson(1, 'تم اضافه طلب التبرع بنجاح', $donation);
        }
    }
    //======================================= Donations =========================================//

    //======================================= Posts  & Favorites ================================//
    public function posts(Request $request)
    {
        $posts = Post::with('category')->where(function ($post) use ($request) {
            if ($request->category_id) {
                $post->where('category_id', $request->category_id);
            }
        })->paginate(10);
        return responseJson(1, 'Success', $posts);
    }

    public function post(Request $request)
    {
        $post = Post::with('category')->find($request->post_id);
        if (!$post) {
            return responseJson(0, 'No Post Found');
        }
        return responseJson(1, 'Success', $post);
    }

    public function listFavourites(Request $request)
    {
        $posts = $request->user()->posts()->with('category')->paginate(10);//->toSql();
        // OR
//        $client = Client::where('api_token',$request->api_token)->first();
//        if ($client){
//            $client_id = $client->id;
//        }
//        $posts = Post::join('client_post','posts.id','=','client_post.post_id')->where('client_post.client_id',$client_id)->paginate(10);
        return responseJson(1, 'Success', $posts);
    }

    public function postToggleFavourite(Request $request)
    {
        $rules = [
            'post_id' => 'required|exists:posts,id',
        ];
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return responseJson(2, $validate->errors());
        }
        $posts = $request->user()->posts()->toggle($request->post_id);
        return responseJson(1, 'Success', $posts);
    }

    //======================================= Posts  & Favorites ================================//

    public function notifications(Request $request)
    {
        $notifications = $request->user()->notifications()->latest()->paginate(10);
        return responseJson(1, 'Success', $notifications);
    }

    public function notificationsCount(Request $request)
    {
//        $notifications_count = $request->user()->notifications()->count();
        $notifications_count = $request->user()->notifications()->where(function ($query) {
            $query->where('is_read', 1);
        })->count();
        return responseJson(1, 'Success', ['notification_count' => $notifications_count]);
    }
}
