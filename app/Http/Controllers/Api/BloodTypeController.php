<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BloodTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blood_types = BloodType::all();
        return responseJson(1, 'Success', $blood_types);
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
        $rules = ['name' => 'required|unique:blood_types'];
        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return responseJson(2, $validate->errors());
        } else {
            $data['name'] = $request->name;
            $blood_type = BloodType::create($data);
            return responseJson(1, 'تم اضافه فصيله الدم بنجاح', $blood_type);
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
        $blood_type = BloodType::find($id);
        return responseJson(1, 'Success', $blood_type);
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
        $blood_type = BloodType::find($id);

        if (!$blood_type) {
            return responseJson(0,'عفوا , ID قصيله الدم ' . $id . ' غير موجود');
        }

        $updated = $blood_type->update($request->all());

        if ($updated) {
            return responseJson(1,'تم تحديث قصيله الدم بنجاح',$blood_type);
        } else {
            return responseJson(0,'خطأ أثناء تحديث قصيله الدم');
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
        $blood_type = BloodType::find($id);
        if (!$blood_type) {
            return responseJson(0,'عفوا , ID قصيله الدم ' . $id . ' غير موجود');
        }
        if ($blood_type->delete()){
            return responseJson(1, 'تم حذف فصيله الدم بنجاح');
        }
    }
}
