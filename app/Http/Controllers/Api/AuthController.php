<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register()
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
        $validate = Validator::make(request()->all(), $rules);
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

    public function login()
    {
        $rules = [
            'phone' => 'required',
            'password' => 'required',
        ];
        $validate = Validator::make(request()->all(), $rules);
        if ($validate->fails()) {
            return responseJson(2, $validate->errors());
        } else {
            $client = Client::where('phone',request('phone'))->first();
            if ($client){
                if (Hash::check(request('password'),$client->password)){
                    return responseJson(1, 'تم الدخول بنجاح',[
                        'api_token' => $client->api_token,
                        'client' => $client
                    ]);
                }else{
                    return responseJson(0, 'بيانات الدخول غير صحيحه');
                }
            }else{
                return responseJson(0, 'بيانات الدخول غير صحيحه');
            }
        }
    }
}
