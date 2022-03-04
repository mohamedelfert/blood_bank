<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Client;
use App\Models\Governorate;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function signup()
    {
        $blood_types = BloodType::all();
        $governorates = Governorate::all();
        $cities = City::all();
        return view('front.signup',compact('blood_types','governorates','cities'));
    }

    public function doSignup(Request $request)
    {
        $rules = [
            'name' => 'required|unique:clients',
            'email' => 'required|email|unique:clients',
            'phone' => 'required|unique:clients|digits:11',
            'password' => 'required|confirmed|min:6',
            'd_o_b' => 'required',
            'blood_type_id' => 'required|exists:blood_types,id',
            'last_donation_date' => 'required',
            'city_id' => 'required|exists:cities,id',
        ];
        $validate_msg = [
            'name.required' => 'يجب كتابه الاسم',
            'name.unique' => 'الاسم مسجل مسبقا',
            'email.required' => 'يجب كتابه البريد الإلكتروني',
            'email.email' => 'البريد الإلكتروني غير صحيح',
            'email.unique' => 'البريد الإلكتروني مسجل مسبقا',
            'phone.required' => 'يجب كتابه رقم الهاتف',
            'phone.unique' => 'رقم الهاتف مسجل مسبقا',
            'phone.digits' => 'رقم الهاتف غير صحيح الرجاء كتابته بصوره صحيحه',
            'password.required' => 'يجب كتابه كلمه المرور',
            'password.confirmed' => 'كلمه المرور لا تطابق تأكيد كلمه المرور',
            'password.min' => 'يجب ان تكون كلمه المرور اكثر من 6 احرف',
            'd_o_b.required' => 'يجب كتابه تاريخ الميلاد',
            'blood_type_id.required' => 'يجب اختيار فصيله الدم',
            'blood_type_id.exists' => 'فصيله الدم غير موجوده',
            'last_donation_date.required' => 'يجب كتابه تاريخ اخر عمليه تبرع بالدم',
            'city_id.required' => 'يجب اختيار المدينة',
            'city_id.exists' => 'المدينة غير موجوده',
        ];
        $data = $this->validate($request, $rules, $validate_msg);

        $data['password'] = bcrypt(request('password'));
        $client = Client::create($data);
        $client->api_token = str::random(60);
        $client->is_active = 0;
        $client->save();
        $client->governorates()->attach(optional($client->city)->governorate_id); // to add in table ( client_governorate ) client_id and governorate_id ( for notification settings )
        $client->bloodTypes()->attach($client->blood_type_id); // to add in table ( blood_type_client ) client_id and blood_type_id ( for notification settings )

        toastr()->success(trans('messages.success'));
        return redirect(url('/'));
    }

    public function signin()
    {
        $settings = Setting::first();
        return view('front.signin',compact('settings'));
    }

    public function doSignin(Request $request)
    {
        $rules = [
            'phone' => 'required|digits:11',
            'password' => 'required',
        ];
        $validate_msg = [
            'phone.required' => 'يجب كتابه رقم الهاتف',
            'phone.digits' => 'رقم الهاتف غير صحيح الرجاء كتابته بصوره صحيحه',
            'password.required' => 'يجب كتابه كلمه المرور',
        ];
        $data = $this->validate($request, $rules, $validate_msg);
        $client = Client::where('phone', request('phone'))->first();
        if ($client) {
            $remember = $request->remember == 1 ? true : false;
            if (auth()->guard('client')->attempt(['phone' => $request->phone, 'password' => $request->password,'is_active' => 1], $remember)) {
                return redirect(url('/'));
            } else {
                toastr()->error(trans('messages.error'));
                return redirect()->back();
            }
        }
    }

    public function profile($id)
    {
        $client = Client::findOrFail($id);
        $blood_types = BloodType::all();
        $cities = City::all();
        return view('front.client-profile',compact('client','blood_types','cities'));
    }

    public function edit_profile(Request $request,$id)
    {
        $rules = [
            'name' => 'required|unique:clients,name,'.$id,
            'email' => 'required|email|unique:clients,email,'.$id,
            'phone' => 'required|unique:clients,phone,'.$id.'|digits:11',
            'password' => 'required|confirmed|min:6',
            'd_o_b' => 'required',
            'blood_type_id' => 'required|exists:blood_types,id',
            'last_donation_date' => 'required',
            'city_id' => 'required|exists:cities,id',
        ];
        $validate_msg = [
            'name.required' => 'يجب كتابه الاسم',
            'name.unique' => 'الاسم مسجل مسبقا',
            'email.required' => 'يجب كتابه البريد الإلكتروني',
            'email.email' => 'البريد الإلكتروني غير صحيح',
            'email.unique' => 'البريد الإلكتروني مسجل مسبقا',
            'phone.required' => 'يجب كتابه رقم الهاتف',
            'phone.unique' => 'رقم الهاتف مسجل مسبقا',
            'phone.digits' => 'رقم الهاتف غير صحيح الرجاء كتابته بصوره صحيحه',
            'password.required' => 'يجب كتابه كلمه المرور',
            'password.confirmed' => 'كلمه المرور لا تطابق تأكيد كلمه المرور',
            'password.min' => 'يجب ان تكون كلمه المرور اكثر من 6 احرف',
            'd_o_b.required' => 'يجب كتابه تاريخ الميلاد',
            'blood_type_id.required' => 'يجب اختيار فصيله الدم',
            'blood_type_id.exists' => 'فصيله الدم غير موجوده',
            'last_donation_date.required' => 'يجب كتابه تاريخ اخر عمليه تبرع بالدم',
            'city_id.required' => 'يجب اختيار المدينة',
            'city_id.exists' => 'المدينة غير موجوده',
        ];
        $data = $this->validate($request, $rules, $validate_msg);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['password'] = bcrypt(request('password'));
        $data['d_o_b'] = $request->d_o_b;
        $data['blood_type_id'] = $request->blood_type_id;
        $data['last_donation_date'] = $request->last_donation_date;
        $data['city_id'] = $request->city_id;
        $data['api_token'] = str::random(60);
        $data['is_active'] = 1;

        $client = Client::findOrFail($id);
        $client->update($data);
        $client->governorates()->sync(optional($client->city)->governorate_id); // to add in table ( client_governorate ) client_id and governorate_id ( for notification settings )
        $client->bloodTypes()->sync($client->blood_type_id); // to add in table ( blood_type_client ) client_id and blood_type_id ( for notification settings )

        toastr()->warning(trans('messages.update'));
        return back();
    }

    public function clint_logout()
    {
        auth()->guard('client')->logout();
        return redirect(route('signin'));
    }
}
