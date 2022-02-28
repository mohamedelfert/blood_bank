<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
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
            'title' => 'required|unique:posts',
            'content' => 'required',
            'category_id' => 'required',
            'publish_date' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
        ];
        $validate_msg = [
            'title.required' => 'يجب كتابه عنوان للمقال',
            'title.unique' => 'عنوان المقال مسجل مسبقا',
            'content.required' => 'يجب كتابه محتوي للمقال',
            'category_id.required' => 'يجب اختيار القسم الخاص بالمقال',
            'publish_date.required' => 'يجب اختيار تاريخ النشر',
            'image.mimes' => 'يجب ان يكون الملف باحد الصيغ :  JPG , JPEG , PNG'
        ];
        $data = $this->validate($request, $rules, $validate_msg);

        try {
            $post = new Post();
            $post->title = $request->title;
            $post->content = $request->content;
            $post->category_id = $request->category_id;
            $post->publish_date = $request->publish_date;
            $post->client_id = auth()->user()->id;
            $post->save();

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $file_name = time() . $file->getClientOriginalName();
                $file->move(public_path('Attachments/' . $request->title), $file_name);
                $post->image = $file_name;
                $post->save();
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
            'title' => 'required|unique:posts,title,' . $id,
            'content' => 'required',
            'category_id' => 'required',
            'publish_date' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
        ];
        $validate_msg = [
            'title.required' => 'يجب كتابه عنوان للمقال',
            'title.unique' => 'عنوان المقال مسجل مسبقا',
            'content.required' => 'يجب كتابه محتوي للمقال',
            'category_id.required' => 'يجب اختيار القسم الخاص بالمقال',
            'publish_date.required' => 'يجب اختيار تاريخ النشر',
            'image.mimes' => 'يجب ان يكون الملف باحد الصيغ :  JPG , JPEG , PNG'
        ];
        $data = $this->validate($request, $rules, $validate_msg);

        try {
            $data['title'] = $request->title;
            $data['content'] = $request->content;
            $data['category_id'] = $request->category_id;
            $data['publish_date'] = $request->publish_date;
            $data['client_id'] = auth()->user()->id;
            $post = Post::findOrFail($id);
            $post->update($data);
            if ($request->hasFile('image')) {

                $post->where('id',$request->id)->first();
                if (!empty($post->title)){
                    Storage::disk('public_path')->deleteDirectory($post->title);
                }

                $file = $request->file('image');
                $file_name = time() . $file->getClientOriginalName();
                $file->move(public_path('Attachments/' . $request->title), $file_name);
                $post->image = $file_name;
                $post->save();
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
     * @param int $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        $post = Post::findOrFail($request->id);
        $post->where('id',$request->id)->first();
        if (!empty($post->title)){
            Storage::disk('public_path')->deleteDirectory($post->title);
        }
        $post->delete();
        toastr()->error(trans('messages.delete'));
        return back();
    }
}
