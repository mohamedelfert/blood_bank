<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
//    function __construct()
//    {
//        $this->middleware('permission:user-delete|user-edit|user-create|user-list', ['only' => ['index', 'store']]);
//        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
//        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
//        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
//    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $title = trans('main.users');
        $users = User::orderBy('id', 'DESC')->paginate(20);
        return view('admin.users.index', compact('title', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $title = trans('admin.add_user');
        $roles = Role::pluck('name', 'name')->all();
        return view('admin.users.create', compact('roles', 'title'));
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
            'name' => 'required|min:5|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'status' => 'required',
            'role_name' => 'required'
        ];
        $validate_msg_ar = [
            'name.required' => 'يجب كتابه اسم المستخدم',
            'name.unique' => 'اسم المستخدم مسجل مسبقا',
            'name.min' => 'يجب ان لايقل اسم المستخدم عن 5 أحرف',
            'email.required' => 'يجب كتابه بريد الكتروني',
            'email.unique' => 'البريد الالكتروني مسجل مسبقا',
            'password.required' => 'يجب كتابه باسوورد',
            'password.same' => 'كلمه المرور لا تساوي تاكيد كلمه المرور',
            'status.required' => 'يجب اختيار حاله المستخدم',
            'role_name.required' => 'يجب اختيار صلاحيه للمستخدم'
        ];
        $data = $this->validate($request, $rules, $validate_msg_ar);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        $user->assignRole($request->input('role_name'));

        toastr()->success(trans('messages.success'));
        return redirect(adminUrl('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
//        $user = User::find($id);
//        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $title = trans('admin.edit_user');
        $user = User::findOrFail($id);
        $roles = Role::pluck('name', 'name')->all();

        return view('admin.users.edit', compact('user', 'roles', 'title'));
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
        $rules = [
            'name' => 'required|min:5|unique:users,name,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|same:confirm-password',
            'status' => 'required',
            'role_name' => 'required'
        ];
        $validate_msg_ar = [
            'name.required' => 'يجب كتابه اسم المستخدم',
            'name.unique' => 'اسم المستخدم مسجل مسبقا',
            'name.min' => 'يجب ان لايقل اسم المستخدم عن 5 أحرف',
            'email.required' => 'يجب كتابه بريد الكتروني',
            'email.unique' => 'البريد الالكتروني مسجل مسبقا',
            'password.required' => 'يجب كتابه باسوورد',
            'password.same' => 'كلمه المرور لا تساوي تاكيد كلمه المرور',
            'status.required' => 'يجب اختيار حاله المستخدم',
            'role_name.required' => 'يجب اختيار صلاحيه للمستخدم'
        ];
        $data = $this->validate($request, $rules, $validate_msg_ar);

        $data = $request->all();
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data = Arr::except($data, array('password'));
        }

        $user = User::findOrFail($id);
        $user->update($data);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('role_name'));

        toastr()->warning(trans('messages.update'));
        return redirect(adminUrl('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        User::findOrFail($id)->delete();
        toastr()->error(trans('messages.delete'));
        return back();
    }

    /**
     * show user profile
     */
    public function user_profile($id)
    {
        $title = trans('admin.user_profile');
        $user = User::findOrFail($id);
        return view('users.show', compact('title', 'user'));
    }
}
