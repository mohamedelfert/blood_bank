<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = trans('main.donations');
        $donations = Donation::paginate(20);
        $blood_types = BloodType::all();
        return view('admin.donations.index', compact('title', 'donations','blood_types'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $donation = Donation::findOrFail($id);
        $title = trans('main.donations');
        return view('admin.donations.donation', compact('title', 'donation'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Donation::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.delete'));
        return back();
    }

    public function bloodTypesFilter(Request $request)
    {
        $id = $request->id;
        $blood_types = BloodType::all();
        $donations = Donation::select('*')->where('blood_type_id',$id)->get();
        $title = trans('main.donations');
        return view('admin.donations.index', compact('title', 'donations','blood_types'));
    }

    public function filter(Request $request)
    {
        $donations = Donation::where(function ($query) use ($request) {
            if ($request->has('keyword')){
                $query->where('patient_name','like','%'.$request->keyword.'%');
                $query->orWhere('patient_phone','like','%'.$request->keyword.'%');
                $query->orWhere('hospital_name','like','%'.$request->keyword.'%');
            }
        })->paginate(20);
        $blood_types = BloodType::all();
        $title = trans('main.donations');
        return view('admin.donations.index', compact('title', 'donations','blood_types'));
    }
}
