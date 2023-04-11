<?php

namespace App\Http\Controllers;

use App\Models\User;
// use App\Services\UserService;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = User::find(auth()->id())->courses;
        return view('profile.show', [
            'title' => 'Trang cá nhân',
            'courses' => $courses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();
        auth()->user()->update(array_filter($data));


        return redirect()->route('profiles.index');
    }
}