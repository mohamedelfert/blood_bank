<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = trans('main.posts');
        $posts = Post::all();
        $categories = Category::all();
        return view('admin.posts.index', compact('title', 'posts', 'categories'));
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
        $rules = [
            'title' => 'required|unique:posts',
            'content' => 'required',
            'category_id' => 'required',
            'publish_date' => 'required'
        ];
        $validate_msg = [
            'title.required' => 'يجب كتابه عنوان للمقال',
            'title.unique' => 'عنوان المقال مسجل مسبقا',
            'content.required' => 'يجب كتابه محتوي للمقال',
            'category_id.required' => 'يجب اختيار القسم الخاص بالمقال',
            'publish_date.required' => 'يجب اختيار تاريخ النشر',
        ];
        $data = $this->validate($request, $rules, $validate_msg);

        try {
            $data['title'] = $request->title;
            $data['content'] = $request->content;
            $data['category_id'] = $request->category_id;
            $data['publish_date'] = $request->publish_date;
            $data['client_id'] = 1;
            Post::create($data);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file_name = time() . $file->getClientOriginalName();
                $file->move(public_path('Attachments/'. $request->title),$file_name);
                $data['image'] = $file_name;
                Post::create($data);
            }
            toastr()->success(trans('messages.success'));
            return back();

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
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
        //
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
    public function update(Request $request)
    {
        $id = $request->id;
        $rules = [
            'title' => 'required|unique:posts,title,'.$id,
            'content' => 'required',
            'category_id' => 'required',
            'publish_date' => 'required'
        ];
        $validate_msg = [
            'title.required' => 'يجب كتابه عنوان للمقال',
            'title.unique' => 'عنوان المقال مسجل مسبقا',
            'content.required' => 'يجب كتابه محتوي للمقال',
            'category_id.required' => 'يجب اختيار القسم الخاص بالمقال',
            'publish_date.required' => 'يجب اختيار تاريخ النشر',
        ];
        $data = $this->validate($request, $rules, $validate_msg);

        try {
            $post = Post::findOrFail($id);
            $data['title'] = $request->title;
            $data['content'] = $request->content;
            $data['category_id'] = $request->category_id;
            $data['publish_date'] = $request->publish_date;
            $data['client_id'] = 1;
           $post->update($data);
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file_name = time() . $file->getClientOriginalName();
                $file->move(public_path('Attachments/'. $request->title),$file_name);
                $data['image'] = $file_name;
                Post::save($data);
            }
            toastr()->warning(trans('messages.update'));
            return back();

        } catch (Exception $e) {
            return redirect()->back()->withErrors(['errors' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Post::findOrFail($request->id)->delete();
        toastr()->error(trans('messages.delete'));
        return back();
    }
}
