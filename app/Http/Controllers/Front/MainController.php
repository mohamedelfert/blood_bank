<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Contact;
use App\Models\Donation;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        $posts = Post::where('publish_date','<',Carbon::now()->toDateString())->take(9)->get();
        $donation_requests = Donation::orderBy('id', 'desc')->paginate(4);
        $blood_types = BloodType::all();
        $cities = City::all();
        return view('front.home', compact('posts', 'donation_requests', 'blood_types', 'cities'));
    }

    public function about_us()
    {
        return view('front.about-us');
    }

    public function about_app()
    {
        return view('front.about-app');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function add_contact(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:11',
            'subject' => 'required',
            'message' => 'required',
        ];
        $validate_msg = [
            'name.required' => 'يجب كتابه الاسم',
            'email.required' => 'يجب كتابه البريد الإلكتروني',
            'email.email' => 'البريد الإلكتروني غير صحيح',
            'phone.required' => 'يجب كتابه رقم الهاتف',
            'phone.digits' => 'رقم الهاتف غير صحيح الرجاء كتابته بصوره صحيحه',
            'subject.required' => 'يجب كتابه عنوان للرسالة',
            'message.required' => 'يجب كتابه محتوي للرسالة',
        ];
        $data = $this->validate($request, $rules, $validate_msg);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;
        Contact::create($data);
        toastr()->success(trans('messages.success'));
        return back();
    }

    public function donation_requests()
    {
        $donation_requests = Donation::orderBy('id', 'desc')->paginate(9);
        $blood_types = BloodType::all();
        $cities = City::all();
        if (!empty($request->blood_type_id) && !empty($request->city_id)) {
            $donation_requests = Donation::where('blood_type_id', $request->blood_type_id)->where('city_id', $request->city_id)->paginate(4);
        } elseif (!empty($request->blood_type_id)) {
            $donation_requests = Donation::where('blood_type_id', $request->blood_type_id)->paginate(4);
        } elseif (!empty($request->city_id)) {
            $donation_requests = Donation::where('city_id', $request->city_id)->paginate(4);
        }
        return view('front.donation-requests', compact('donation_requests', 'blood_types', 'cities'));
    }

    public function donation_details($id)
    {
        $donation_request = Donation::findOrFail($id);
        return view('front.donation-request-details', compact('donation_request'));
    }

    public function donation_requests_filter(Request $request)
    {
        $blood_types = BloodType::all();
        $cities = City::all();
        if (!empty($request->blood_type_id) && !empty($request->city_id)) {
            $donation_requests = Donation::where('blood_type_id', $request->blood_type_id)->where('city_id', $request->city_id)->paginate(4);
        } elseif (!empty($request->blood_type_id)) {
            $donation_requests = Donation::where('blood_type_id', $request->blood_type_id)->paginate(4);
        } elseif (!empty($request->city_id)) {
            $donation_requests = Donation::where('city_id', $request->city_id)->paginate(4);
        }
        return view('front.home', compact('donation_requests', 'blood_types', 'cities'));
    }

    public function add_donation()
    {
        $blood_types = BloodType::all();
        $cities = City::all();
        return view('front.add-donation-request', compact('blood_types', 'cities'));
    }

    public function add_donation_request(Request $request)
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
        $validate_msg = [
            'patient_name.required' => 'يجب كتابه اسم المريض',
            'patient_phone.required' => 'يجب كتابه هاتف المريض',
            'patient_phone.digits' => 'الهاتف غير صحيح',
            'patient_age.required' => 'يجب كتابه عمر المريض',
            'patient_age.digits' => 'العمر غير صحيح',
            'blood_type_id.required' => 'يجب اختيار فصيله الدم',
            'blood_type_id.exists' => 'فصيله الدم غير موجوده',
            'city_id.required' => 'يجب اختيار المدينة',
            'city_id.exists' => 'المدينة غير موجوده',
            'bags_num.required' => 'يجب كتابه عدد اكياس الدم',
            'bags_num.digits' => 'العدد غير صحيح',
            'hospital_name.required' => 'يجب كتابه اسم المستشفي',
            'hospital_address.required' => 'يجب كتابه عنوان المستشفي',
            'latitude.required' => 'يجب كتابه خط الطول',
            'longitude.required' => 'يجب كتابه خط العرض',
            'details.required' => 'يجب كتابه تفاصيل الحالة',
        ];
        $data = $this->validate($request, $rules, $validate_msg);
        $data['patient_name'] = $request->patient_name;
        $data['patient_phone'] = $request->patient_phone;
        $data['patient_age'] = $request->patient_age;
        $data['blood_type_id'] = $request->blood_type_id;
        $data['city_id'] = $request->city_id;
        $data['client_id'] = auth()->guard('client')->user()->id;
        $data['bags_num'] = $request->bags_num;
        $data['hospital_name'] = $request->hospital_name;
        $data['hospital_address'] = $request->hospital_address;
        $data['latitude'] = $request->latitude;
        $data['longitude'] = $request->longitude;
        $data['details'] = $request->details;

        $donation_request = Donation::create($data);

        // find clients for this donation request based on governorate and blood type
        $clients_ids = $donation_request->city->governorate->clients()->whereHas('bloodTypes', function ($query) use ($donation_request) {
            $query->where('blood_types.id', $donation_request->blood_type_id);
        })->pluck('clients.id')->toArray();

        if (count($clients_ids)) {
            // create notification on database
            $notification = $donation_request->notifications()->create([
                'title' => 'حاله تحتاج تبرع قريبه منك',
                'content' => optional($donation_request->bloodType)->name . 'يوجد حاله تحتاج الي التبرع بالدم قريبه منك فصيله دمها '
            ]);
            $notification->clients()->attach($clients_ids);
        }

        toastr()->success(trans('messages.success'));
        return redirect(route('donation-requests'));
    }

    public function posts()
    {
        $posts = Post::where('publish_date','<',Carbon::now()->toDateString())->take(9)->get();
        return view('front.posts',compact('posts'));
    }

    public function post($id)
    {
        $post = Post::findOrFail($id);
        $posts = Post::all();
        return view('front.post-details',compact('post','posts'));
    }

//    public function toggleFavourite(Request $request)
//    {
//        $toggle = $request->user()->posts()->toggle($request->post_id);
//        return responseJson(1,'success',$toggle);
//    }
}
