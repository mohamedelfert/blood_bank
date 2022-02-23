<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $title = trans('main.cities');
        $cities = City::all();
        $governorates = Governorate::all();
        return view('admin.cities.index', compact('title', 'cities', 'governorates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:cities',
            'governorate_id' => 'required',
        ];
        $validate_msg = [
            'name.required' => 'يجب كتابه اسم المدينه',
            'name.unique' => 'اسم المدينه مسجل مسبقا',
            'governorate_id.required' => 'يجب اختيار المحافظه التابعه لها',
        ];
        $data = $this->validate($request, $rules, $validate_msg);

        try {
            $data['name'] = $request->name;
            $data['governorate_id'] = $request->governorate_id;
            City::create($data);

            toastr()->success(trans('messages.success'));
            return back();

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $rules = [
            'name' => 'required|unique:cities,name,'.$id,
            'governorate_id' => 'required',
        ];
        $validate_msg = [
            'name.required' => 'يجب كتابه اسم المدينه',
            'name.unique' => 'اسم المدينه مسجل مسبقا',
            'governorate_id.required' => 'يجب اختيار المحافظه التابعه لها',
        ];
        $data = $this->validate($request, $rules, $validate_msg);

        try {
            $city = City::findOrFail($id);
            $data['name'] = $request->name;
            $data['governorate_id'] = $request->governorate_id;
            $city->update($data);

            toastr()->success(trans('messages.update'));
            return back();

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        City::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.delete'));
        return back();
    }
}
