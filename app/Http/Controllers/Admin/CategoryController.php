<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $title = trans('main.categories');
        $categories = Category::all();
        return view('admin.categories.index', compact('title', 'categories'));
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
        $rules = ['name' => 'required|unique:categories'];
        $validate_msg = [
            'name.required' => 'يجب كتابه اسم التنصيف',
            'name.unique' => 'اسم التنصيف مسجل مسبقا',
        ];
        $data = $this->validate($request, $rules, $validate_msg);

        try {
            $data['name'] = $request->name;
            Category::create($data);

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
        $rules = ['name' => 'required|unique:categories,name,'.$id];
        $validate_msg = [
            'name.required' => 'يجب كتابه اسم التنصيف',
            'name.unique' => 'اسم التنصيف مسجل مسبقا',
        ];
        $data = $this->validate($request, $rules, $validate_msg);

        try {
            $category = Category::findOrFail($id);
            $data['name'] = $request->name;
            $category->update($data);

            toastr()->warning(trans('messages.update'));
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
        Category::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.delete'));
        return back();
    }
}
