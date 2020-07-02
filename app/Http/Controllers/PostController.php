<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Post;
use App\Category;
use App\Consumer;
use Auth;

class PostController extends Controller
{
    public function articleWriterIndex()
    {
        $post = Post::where([['users_id',Auth::user()->id], ['type','article'], ['status', '<>', 'publish']])->paginate(5);

        return view('writer.post.index', compact('post'));
    }

    public function articlePublishIndex()
    {
        $post = Post::where([['users_id',Auth::user()->id], ['type','article'], ['status', '=', 'publish']])->paginate(5);

        return view('writer.post.publish', compact('post'));
    }

    public function articleWriterCreate()
    {
        $category = Category::all();
        $editor = Consumer::where('user_types_id',2)->get();

        return view('writer.post.create', compact('category', 'editor'));
    }
    
    public function articleWriterStore(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'desc'=>'required',
            'body' => 'required',
            'image' => 'required',
            'editor' => 'required'
        ]);

        $img = $request->image;
        $new_img = time().$img->getClientOriginalName();

        $post = Post::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'category_id' => $request->category,
            'users_id' => Auth::user()->id,
            'editors_id' => $request->editor,
            'image' => 'public/upload/posts/'.$new_img,
            'description' => $request->desc,
            'body' => $request->body,
            'type' => $request->type
        ]);

        $img->move('public/upload/posts/', $new_img);

        return redirect()->back()->with('success', 'Article data successfully added');
    }

    public function articleWriterEdit($id)
    {
        $post = Post::findorfail($id);
        $category = Category::all();
        $editor = Consumer::where('user_types_id',2)->get();

        return view('writer.post.edit', compact('post', 'category', 'editor'));
    }

    public function articleWriterUpdate(Request $request, $id)
    {
        $post = Post::findorfail($id);
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'desc'=>'required',
            'body' => 'required'
        ]);

        if($request->has('image')) {
            $img = $request->image;
            $new_img = time().$img->getClientOriginalName();
            $img->move('public/upload/posts/', $new_img);
            $post_data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'category_id' => $request->category,
                'image' => 'public/upload/posts/'.$new_img,
                'description' => $request->desc,
                'body' => $request->body,
                'editors_id' => $request->editor,
                'type' => $request->type
            ];
        } else {
            $post_data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'category_id' => $request->category,
                'description' => $request->desc,
                'body' => $request->body,
                'editors_id' => $request->editor,
                'type' => $request->type
            ];
        }

        $post->update($post_data);

        return redirect('/writer/post')->with('success', 'Article data successfully updated');
    }

    public function articleWriterDestroy($id)
    {
        $post = Post::findorfail($id);
        $post->delete();

        return redirect('/writer/post')->with('success', 'Article data successfully deleted');
    }

    public function articleEditorIndex()
    {
        $post = Post::where([['editors_id',Auth::user()->id], ['type','article'], ['status', '<>', 'publish']])->paginate(5);

        return view('editor.post.index', compact('post'));
    }

    public function articlePublishEditorIndex()
    {
        $post = Post::where([['editors_id',Auth::user()->id], ['type','article'], ['status', '=', 'publish']])->paginate(5);

        return view('editor.post.publish', compact('post'));
    }
    
    public function articleEditorEdit($id)
    {
        $post = Post::findorfail($id);
        $category = Category::all();
        $editor = Consumer::where('user_types_id',2)->get();

        return view('editor.post.edit', compact('post', 'category', 'editor'));
    }

    public function articleEditorUpdate(Request $request, $id)
    {
        $post = Post::findorfail($id);
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'desc'=>'required',
            'body' => 'required'
        ]);

        if($request->has('image')) {
            $img = $request->image;
            $new_img = time().$img->getClientOriginalName();
            $img->move('public/upload/posts/', $new_img);
            $post_data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'category_id' => $request->category,
                'image' => 'public/upload/posts/'.$new_img,
                'description' => $request->desc,
                'body' => $request->body,
                'status' => $request->status,
                'reason' => $request->reason
            ];
        } else {
            $post_data = [
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'category_id' => $request->category,
                'description' => $request->desc,
                'body' => $request->body,
                'status' => $request->status,
                'reason' => $request->reason
            ];
        }

        $post->update($post_data);

        return redirect('/editor/post')->with('success', 'Article data successfully updated');
    }
}
