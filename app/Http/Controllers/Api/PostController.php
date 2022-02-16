<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function posts(Request $request)
    {
        $posts = Post::with('categoryName')->paginate(10);
        return responseJson(1, 'Success', $posts);
    }
}
