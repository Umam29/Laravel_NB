<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Consumer;
use App\Post;

class EditorController extends Controller
{
    public function editorProfile()
    {
        $editor = Consumer::findorfail(Auth::user()->id);
        $count_post = Post::where('editors_id',Auth::user()->id)->count();
        
        return view('editor.profile.index', compact('editor', 'count_post'));
    }

    public function changePorfile(Request $request)
    {
        $editor = Consumer::findorfail(Auth::user()->id);        

        if($request->has('avatar')) {
            $ava = $request->avatar;
            $new_ava = time().$ava->getClientOriginalName();

            $ava->move('public/upload/posts/', $new_ava);

            $editor_data = [
                'name' => $request->name,
                'email' => $request->email,
                'avatar' => 'public/upload/posts/'.$new_ava
            ];
            
        } else {
            $editor_data = [
                'name' => $request->name,
                'email' => $request->email
            ];
        }

        $editor->update($editor_data);

        return redirect()->route('editor.profile')->with('success', 'Porfile successfully updated');
    }
}
