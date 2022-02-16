<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return responseJson(1, 'Success', $contacts);
    }

    public function store(Request $request)
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

    public function show($id)
    {
        $contact = Contact::find($id);
        return responseJson(1, 'Success', $contact);
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            return responseJson(0,'عفوا , ID الرساله ' . $id . ' غير موجود');
        }
        if ($contact->delete()){
            return responseJson(1, 'تم حذف الرساله بنجاح');
        }
    }
}
