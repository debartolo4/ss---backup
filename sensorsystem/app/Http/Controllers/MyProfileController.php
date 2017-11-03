<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $currentUser = User::find($id);
        return view ('admin.myProfile')->with('currentUser', $currentUser);
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
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'tel' => 'required|string|min:10|max:10',
            'CF' => 'required|string|max:16|min:16',
            'address' => 'required|string|max:255',
            'num' => 'required|string|max:5',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $currentUser = User::find($id);
        $currentUser->name =  $request->get('name');
        $currentUser->surname = $request->get('surname');
        $currentUser->tel = $request->get('tel');
        $currentUser->CF = $request->get('CF');
        $currentUser->address = $request->get('address');
        $currentUser->num = $request->get('num');
        $currentUser->username = $request->get('username');
        $currentUser->email = $request->get('email');
        $currentUser->password = bcrypt($request->get('password'));
        $currentUser->type = Auth::user()->type;
        $currentUser->client_id = Auth::user()->client_id;

        $currentUser->save();

        return view('admin.myProfile')->with('currentUser', $currentUser);
    }
}
