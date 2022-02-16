<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::where(function ($query) {
            if (request()->has('governorate_id')) {
                $query->where('governorate_id', request('governorate_id'));
            }
        })->get();
        return responseJson(1, 'Success', $cities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = ['name' => 'required|unique:cities', 'governorate_id' => 'required'];
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return responseJson(2, $validate->errors());
        } else {
            $data['name'] = request('name');
            $data['governorate_id'] = request('governorate_id');
            $city = City::create($data);
            return responseJson(1, 'تم اضافه المدينه بنجاح', $city);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = City::find($id);
        return responseJson(1, 'Success', $city);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $city = City::find($id);

        if (!$city) {
            return responseJson(0,'عفوا , ID المدينه ' . $id . ' غير موجود');
        }

        $updated = $city->update($request->all());

        if ($updated) {
            return responseJson(1,'تم تحديث المدينه بنجاح',$city);
        } else {
            return responseJson(0,'خطأ أثناء تحديث المدينه');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $city = City::find($id);
        if (!$city) {
            return responseJson(0,'عفوا , ID المدينه ' . $id . ' غير موجود');
        }
        if ($city->delete()){
            return responseJson(1, 'تم حذف المدينه بنجاح');
        }
    }
}
