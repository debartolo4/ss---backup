<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class CorpmanagerController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.corpManagers.addCorpManager');
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
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'tel' => 'required|string|min:10|max:10',
            'CF' => 'required|string|max:16|min:16',
            'address' => 'required|string|max:255',
            'num' => 'required|string|max:5',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $corpManager = new User();
        $corpManager->name =  $request->get('name');
        $corpManager->surname = $request->get('surname');
        $corpManager->tel = $request->get('tel');
        $corpManager->CF = $request->get('CF');
        $corpManager->address = $request->get('address');
        $corpManager->num = $request->get('num');
        $corpManager->username = $request->get('username');
        $corpManager->email = $request->get('email');
        $corpManager->password = bcrypt($request->get('password'));
        $corpManager->type = 2;
        $corpManager->client_id = $request->get('client_id');
        $corpManager->firstLog = 0;

        $corpManager->save();

        return redirect('/admin/utenti')->with('success', 'Nuovo responsabile aziendale aggiunto con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $corpManager = User::find($id);
        return view('admin.corpManagers.showCorpManager')->with('corpManager', $corpManager);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $corpManager = User::find($id);
        return view ('admin.corpManagers.editCorpManager')->with('corpManager', $corpManager);
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

        $corpManager = User::find($id);
        $corpManager->name =  $request->get('name');
        $corpManager->surname = $request->get('surname');
        $corpManager->tel = $request->get('tel');
        $corpManager->CF = $request->get('CF');
        $corpManager->address = $request->get('address');
        $corpManager->num = $request->get('num');
        $corpManager->email = $request->get('email');
        $corpManager->type = $request->get('type');
        $corpManager->client_id = $request->get('client_id');

        $corpManager->save();

        return redirect('/admin/utenti')->with('success', 'Responsabile aziendale modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $corpManager = User::find($id);
        $corpManager->delete();

        return redirect('admin/utenti')->with('success', 'Responsabile aziendale rimosso con successo');
    }

    /**
     * Change password for the first log-in.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function firstLog($id)
    {

    }
}
