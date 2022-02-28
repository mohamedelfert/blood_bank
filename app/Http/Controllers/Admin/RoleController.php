<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    function __construct()
    {
//        $this->middleware('permission:role-delete|role-edit|role-create|role-list', ['only' => ['index','store']]);
//        $this->middleware('permission:role-create', ['only' => ['create','store']]);
//        $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
//        $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $title = trans('main.users');
        $roles = Role::orderBy('id', 'DESC')->paginate(10);
        return view('admin.roles.index', compact('roles', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $title = trans('admin.add_role');
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions', 'title'));
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
            'name' => 'required|unique:roles,name',
            'display_name' => 'required',
            'permission' => 'required'
        ];
        $validate_msg_ar = [
            'name.required' => 'يجب كتابه اسم الصلاحيه',
            'name.unique' => 'اسم الصلاحيه مسجل مسبقا',
            'display_name.required' => 'يجب كتابه الاسم المعروض',
            'permission.required' => 'يجب اختيار صلاحيه واحده علي الاقل'
        ];
        $data = $this->validate($request, $rules, $validate_msg_ar);

        $data = Role::create(['name' => $request->input('name'), 'display_name' => $request->input('display_name')]);
        $data->syncPermissions($request->input('permission'));

        toastr()->success(trans('messages.success'));
        return redirect(adminUrl('roles'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $title = trans('admin.role_show');
        $role = Role::findOrFail($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();

        return view('admin.roles.show', compact('role', 'rolePermissions', 'title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $title = trans('admin.edit_role');
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('admin.roles.edit', compact('role', 'permissions', 'rolePermissions', 'title'));
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
            'name' => 'required|unique:roles,name,' . $id,
            'display_name' => 'required',
            'permission' => 'required'
        ];
        $validate_msg_ar = [
            'name.required' => 'يجب كتابه اسم الصلاحيه',
            'name.unique' => 'اسم الصلاحيه مسجل مسبقا',
            'display_name.required' => 'يجب كتابه الاسم المعروض',
            'permission.required' => 'يجب اختيار صلاحيه واحده علي الاقل'
        ];
        $data = $this->validate($request, $rules, $validate_msg_ar);

        $role = Role::findOrFail($id);
        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->save();

        $role->syncPermissions($request->input('permission'));

        toastr()->warning(trans('messages.update'));
        return redirect(adminUrl('roles'));
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
        Role::findOrFail($id)->delete();
        toastr()->error(trans('messages.delete'));
        return back();
    }
}
