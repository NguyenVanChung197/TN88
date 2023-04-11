<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rate;
use Illuminate\Support\Facades\Auth;


class RateController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        Rate::create($data);
        return redirect()->back()->with('status', 'active');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rate $rate)
    {
        $data = $request->all();
        $rate->update($data);

        return redirect()->back();
    }

    public function destroy($id)
    {
        Rate::destroy($id);

        return redirect()->back();
    }
}
