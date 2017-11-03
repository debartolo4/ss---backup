<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin = User::find($id);
        return view('admin.show')->with('admin', $admin);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = User::find($id);
        return view ('admin.edit')->with('admin', $admin);
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
            'num' => 'required|string|max:5'
        ]);

        $admin = User::find($id);
        $admin->name =  $request->get('name');
        $admin->surname = $request->get('surname');
        $admin->tel = $request->get('tel');
        $admin->CF = $request->get('CF');
        $admin->address = $request->get('address');
        $admin->num = $request->get('num');
        $admin->email = $request->get('email');
        $admin->type = 1;
        $admin->client_id = 1;

        $admin->save();

        return redirect('/admin/utenti')->with('success', 'Admin modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = User::find($id);
        $admin->delete();

        return redirect('admin/utenti')->with('success', 'Admin rimosso con successo');
    }
}
