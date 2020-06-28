<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Category;
use App\User;

class BlogController extends Controller
{
    public function index()
    {
        $post = Post::where('status', 'publish')->paginate(10);
        return view('blog', compact('post'));
    }

    public function getPost($slug)
    {
        $data = Post::where('slug', $slug)->get();
        return view('blog.content_post', compact('data'));
    }

    public function ListCategory(Category $category)
    {
        $data = $category->post()->where('status', 'publish')->paginate(10);
        return view('blog.list_post_category', compact('data'));
    }

    public function ListUser($users_id)
    {
        $data = Post::where([
            ['users_id', $users_id],
            ['status', 'publish']
        ])->paginate(10);
        return view('blog.list_post_user', compact('data'));
    }
}
