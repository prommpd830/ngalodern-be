<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\LandingPage;
use App\User;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editors = User::where('id_role', 2)->get();
        $lp_logo = LandingPage::first();
        return view('admin.editor.editor', compact('editors', 'lp_logo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.editor.tambah_editor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::where('id', $id)->first();
        $lp_logo = LandingPage::first();
        return view('admin.detail_user', compact('data','lp_logo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        $lp_logo = LandingPage::first();
        return view('admin.edit_profile', compact('data', 'lp_logo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        // $data = request()->validate([
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     'name' => 'required',
        //     'no_telp' => 'required|max:13',
        // ]);

        // // image upload
		// if(request()->hasfile('image')) {
        //     $file = request()->file('image');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = time() . '.' . $extension;
        //     $file->move('upload/profile/', $filename);
        //     $data['image'] = $filename;
        // }

        // // save to db
        // $user->update($data);
        
        // return redirect()->back()->with('success', 'User berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
