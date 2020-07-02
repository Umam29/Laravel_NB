<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Consumer;
use App\Post;

class WriterController extends Controller
{
    public function writerProfile()
    {
        $writer = Consumer::findorfail(Auth::user()->id);
        $count_post = Post::where('users_id',Auth::user()->id)->count();
        
        return view('writer.profile.index', compact('writer', 'count_post'));
    }

    public function changePorfile(Request $request)
    {
        $writer = Consumer::findorfail(Auth::user()->id);        

        if($request->has('avatar')) {
            $ava = $request->avatar;
            $new_ava = time().$ava->getClientOriginalName();

            $ava->move('public/upload/posts/', $new_ava);

            $writer_data = [
                'name' => $request->name,
                'email' => $request->email,
                'avatar' => 'public/upload/posts/'.$new_ava
            ];
            
        } else {
            $writer_data = [
                'name' => $request->name,
                'email' => $request->email
            ];
        }

        $writer->update($writer_data);

        return redirect()->route('writer.profile')->with('success', 'Porfile successfully updated');
    }
}
