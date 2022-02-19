<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

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
                    return responseJson(1, 'تم الدخول بنجاح', [
                        'api_token' => $client->api_token,
                        'client' => $client
                    ]);
                } else {
                    return responseJson(0, 'بيانات الدخول غير صحيحه');
                }
            } else {
                return responseJson(0, 'بيانات الدخول غير صحيحه');
            }
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
        if ($request->has('governorates')){
            $request->user()->governorates()->sync($request->governorates);
        }
        if ($request->has('blood_types')){
            $request->user()->bloodTypes()->sync($request->blood_types);
        }
        $data = [
            'governorate' => $request->user()->governorates()->pluck('governorates.id')->toArray(),
            'blood_types' => $request->user()->bloodTypes()->pluck('blood_types.id')->toArray(),
        ];
        return responseJson(1, 'تم التحديث بنجاح', $data);
    }
}
