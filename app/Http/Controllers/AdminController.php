<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Admin;
use App\Editor;
use App\User;

class AdminController extends Controller
{
    public function adminProfile()
    {
        $admin = Admin::findorfail(Auth::user()->id);
        
        return view('admin.profile.index', compact('admin'));
    }

    public function changePorfile(Request $request)
    {
        $admin = Admin::findorfail(Auth::user()->id);        

        if($request->has('avatar')) {
            $ava = $request->avatar;
            $new_ava = time().$ava->getClientOriginalName();

            $ava->move('public/upload/posts/', $new_ava);

            $admin_data = [
                'name' => $request->name,
                'email' => $request->email,
                'avatar' => 'public/upload/posts/'.$new_ava
            ];
            
        } else {
            $admin_data = [
                'name' => $request->name,
                'email' => $request->email
            ];
        }

        $admin->update($admin_data);

        return redirect()->route('admin.profile')->with('success', 'Porfile successfully updated');
    }

    public function editorIndex()
    {
        $editor = Editor::paginate(5);

        return view('admin.editor.index', compact('editor'));
    }

    public function editorCreate()
    {
        return view('admin.editor.create');
    }

    public function editorStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email'
        ]);

        if($request->input('password')) {
            $password = bcrypt($request->password);
        } else {
            $password = bcrypt('00000000');
        }

        $editor = Editor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password
        ]);

        return redirect()->route('admin.editor')->with('success', 'Editor data successfully added');
    }

    public function editorEdit($id)
    {
        $editor = Editor::findorfail($id);

        return view('admin.editor.edit', compact('editor'));
    }

    public function editorUpdate(Request $request, $id)
    {
        $editor = Editor::findorfail($id);
        
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email'
        ]);

        if($request->input('password')) {
            $editor_data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ];
        } else {
            $editor_data = [
                'name' => $request->name,
                'email' => $request->email
            ];
        }

        $editor->update($editor_data);

        return redirect()->route('admin.editor')->with('success', 'Editor data successfully updated');
    }

    public function editorDestroy($id)
    {
        $editor = Editor::findorfail($id);
        $editor->delete();

        return redirect()->route('admin.editor')->with('success', 'Editor data successfully deleted');
    }

    public function writerIndex()
    {
        $writer = User::paginate(5);

        return view('admin.writer.index', compact('writer'));
    }

    public function writerCreate()
    {
        return view('admin.writer.create');
    }

    public function writerStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email'
        ]);

        if($request->input('password')) {
            $password = bcrypt($request->password);
        } else {
            $password = bcrypt('00000000');
        }

        $writer = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password
        ]);

        return redirect()->route('admin.writer')->with('success', 'Writer data successfully added');
    }

    public function writerEdit($id)
    {
        $writer = User::findorfail($id);

        return view('admin.writer.edit', compact('writer'));
    }

    public function writerUpdate(Request $request, $id)
    {
        $writer = User::findorfail($id);
        
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email'
        ]);

        if($request->input('password')) {
            $writer_data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ];
        } else {
            $writer_data = [
                'name' => $request->name,
                'email' => $request->email
            ];
        }

        $writer->update($writer_data);

        return redirect()->route('admin.writer')->with('success', 'Writer data successfully updated');
    }

    public function writerDestroy($id)
    {
        $writer = User::findorfail($id);
        $writer->delete();

        return redirect()->route('admin.writer')->with('success', 'Writer data successfully deleted');
    }
}
