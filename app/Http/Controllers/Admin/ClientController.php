<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BloodType;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $title = trans('main.clients');
        $clients = Client::paginate(20);
        $blood_types = BloodType::all();
        return view('admin.clients.index', compact('title', 'clients','blood_types'));
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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        $client = Client::findOrFail($request->id);
        if ($client->donations->count() || $client->contacts->count()) {
            toastr()->error(trans('admin.client_delete_message'));
        } else {
            $client->delete();
            toastr()->error(trans('messages.delete'));
        }
        return back();
    }

    public function activate($id)
    {
        $client = Client::findOrFail($id);
        $client->update(['is_active' => 1]);
        toastr()->warning(trans('messages.update'));
        return back();
    }

    public function deactivate($id)
    {
        $client = Client::findOrFail($id);
        $client->update(['is_active' => 0]);
        toastr()->warning(trans('messages.update'));
        return back();
    }

    public function bloodTypesFilter(Request $request)
    {
        $id = $request->id;
        $blood_types = BloodType::all();
        $clients = Client::select('*')->where('blood_type_id',$id)->get();
        $title = trans('main.clients');
        return view('admin.clients.index', compact('title', 'clients','blood_types'));
    }

    public function filter(Request $request)
    {
        $clients = Client::where(function ($query) use ($request) {
           if ($request->has('keyword')){
               $query->where('name','like','%'.$request->keyword.'%');
               $query->orWhere('email','like','%'.$request->keyword.'%');
               $query->orWhere('phone','like','%'.$request->keyword.'%');
           }
        })->paginate(20);
        $blood_types = BloodType::all();
        $title = trans('main.clients');
        return view('admin.clients.index', compact('title', 'clients','blood_types'));
    }
}
