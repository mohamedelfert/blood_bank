<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ClientResetPassword;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $rules = [
            'name' => 'required|unique:clients',
            'email' => 'required|unique:clients',
            'phone' => 'required|unique:clients',
            'password' => 'required|min:6',
            'd_o_b' => 'required',
            'blood_type_id' => 'required',
            'last_donation_date' => 'required',
            'city_id' => 'required',
        ];
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return responseJson(2, $validate->errors());
        } else {
            request()->merge(['password' => bcrypt(request('password'))]);
            $client = Client::create(request()->all());
            $client->api_token = str::random(60);
            $client->save();
            $client->governorates()->attach($client->city->governorate_id);
            $client->bloodTypes()->attach($client->blood_type_id);
            return responseJson(1, 'تم اضافه العميل بنجاح', [
                'api_token' => $client->api_token,
                'data' => $client,
            ]);
        }
    }

    public function login(Request $request)
    {
        $rules = [
            'phone' => 'required',
            'password' => 'required',
        ];
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return responseJson(2, $validate->errors());
        } else {
            $client = Client::where('phone', request('phone'))->first();
            if ($client) {
                if (Hash::check(request('password'), $client->password)) {
                    if ($client->is_active == 0) {
                        return responseJson(0, 'تم حظر حسابك .. اتصل بالادارة');
                    }
                    return responseJson(1, 'تم الدخول بنجاح', [
                        'api_token' => $client->api_token,
                        'client' => $client->load('city.governorate', 'bloodType')
                    ]);
                } else {
                    return responseJson(0, 'بيانات الدخول غير صحيحه');
                }
            } else {
                return responseJson(0, 'بيانات الدخول غير صحيحه');
            }
        }
    }

    public function resetPassword(Request $request)
    {
        $rules = ['phone' => 'required|digits:11'];
        $validate = Validator::make(request()->all(), $rules);
        if ($validate->fails()) {
            return responseJson(2, $validate->errors());
        }
        $client = Client::where('phone', $request->phone)->first();
        if ($client) {
            $pin_code = rand(1111,9999);
            $update = $client->update(['pin_code'=>$pin_code]);
            if ($update){
                // send email/pin_code to reset password
                Mail::to($client->email)->send(new ClientResetPassword(['data' => $client, 'pin_code' => $pin_code]));
                return responseJson(1, 'تم ارسال الكود , راجع هاتفك للحصول عليه',[
                    'pin_code' => $pin_code,
                    'email' => $client->email
                ]);
            }else{
                return responseJson(0, 'عفوا , حدث خطأ الرجاء المحاوله مره اخري');
            }
        } else {
            return responseJson(0, 'لايوجد حساب مرتبط بهذا الرقم');
        }
    }

    public function newPassword(Request $request)
    {
        $rules = [
            'pin_code' => 'required',
            'phone' => 'required|digits:11',
            'password'=> 'required|confirmed|min:6',
        ];
        $validate = Validator::make(request()->all(), $rules);
        if ($validate->fails()) {
            return responseJson(2, $validate->errors());
        }
        $client = Client::where('pin_code',$request->pin_code)->where('pin_code','!=',0)->where('phone',$request->phone)->first();
        if ($client) {
            $client->password = bcrypt($request->password);
            $client->pin_code = null;
            if ($client->save()){
                return responseJson(1, 'تم تغيير الباسوورد بنجاح');
            }else{
                return responseJson(0, 'حدث خطأ , الرجاء المحاوله مره اخري');
            }
        }else{
            return responseJson(0, 'الكود غير صالح');
        }
    }

    public function profile()
    {

    }

    public function notificationsSettings(Request $request)
    {
        $rules = [
            'governorates.*' => 'exists:governorates,id',
            'blood_types.*' => 'exists:blood_types,id',
        ];
        $validate = Validator::make(request()->all(), $rules);
        if ($validate->fails()) {
            return responseJson(2, $validate->errors());
        }
        if ($request->has('governorates')) {
            $request->user()->governorates()->sync($request->governorates);
        }
        if ($request->has('blood_types')) {
            $request->user()->bloodTypes()->sync($request->blood_types);
        }
        $data = [
            'governorate' => $request->user()->governorates()->pluck('governorates.id')->toArray(),
            'blood_types' => $request->user()->bloodTypes()->pluck('blood_types.id')->toArray(),
        ];
        return responseJson(1, 'تم التحديث بنجاح', $data);
    }
}
