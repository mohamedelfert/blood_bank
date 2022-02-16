<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $governorates = Governorate::all();
        return responseJson(1, 'Success', $governorates);
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
        $rules = ['name' => 'required|unique:governorates'];
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return responseJson(2, $validate->errors());
        } else {
            $data['name'] = $request->name;
            $governorate = Governorate::create($data);
            return responseJson(1, 'تم اضافه المحافظه بنجاح', $governorate);
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
        $governorate = Governorate::find($id);
        return responseJson(1, 'Success', $governorate);
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
        $governorate = Governorate::find($id);

        if (!$governorate) {
            return responseJson(0,'عفوا , ID المحافظه ' . $id . ' غير موجود');
        }

        $updated = $governorate->update($request->all());

        if ($updated) {
            return responseJson(1,'تم تحديث المحافظه بنجاح',$governorate);
        } else {
            return responseJson(0,'خطأ أثناء تحديث المحافظه');
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
        $governorate = Governorate::find($id);
        if (!$governorate) {
            return responseJson(0,'عفوا , ID المحافظه ' . $id . ' غير موجود');
        }
        if ($governorate->delete()){
            return responseJson(1, 'تم حذف المحافظه بنجاح');
        }
    }
}
