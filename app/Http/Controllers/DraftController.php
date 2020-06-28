<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Category;
use App\User;
use App\Admin;
use App\Editor;
use Auth;

class DraftController extends Controller
{
    public function draftWriterIndex()
    {
        $post = Post::where('type','draft')->paginate(5);

        return view('writer.draft.index', compact('post'));
    }
}
