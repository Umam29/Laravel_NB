<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UserType;

class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = UserType::paginate(5);

        return view('admin.user-type.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'type' => 'required'
        ]);

        $data = UserType::create([
            'types' => $request->type
        ]);

        return redirect()->route('user-types.index')->with('success', 'User type successfully added');
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
        $data = UserType::findorfail($id);

        return view('admin.user-type.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = UserType::findorfail($id);

        $this->validate($request, [
            'type' => 'required'
        ]);

        $data->update(['types' => $request->type]);

        return redirect()->route('user-types.index')->with('success', 'User type successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = UserType::findorfail($id);
        $data->delete();

        return redirect()->route('user-types.index')->with('success', 'User type successfully deleted');
    }
}
