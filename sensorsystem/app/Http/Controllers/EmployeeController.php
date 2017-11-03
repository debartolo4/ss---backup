<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employees.addEmployee');
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

        $employee = new User();
        $employee->name =  $request->get('name');
        $employee->surname = $request->get('surname');
        $employee->tel = $request->get('tel');
        $employee->CF = $request->get('CF');
        $employee->address = $request->get('address');
        $employee->num = $request->get('num');
        $employee->username = $request->get('username');
        $employee->email = $request->get('email');
        $employee->password = bcrypt($request->get('password'));
        $employee->type = 3;
        $employee->client_id = $request->get('client_id');
        $employee->firstLog = 0;

        $employee->save();

        return redirect('/admin/utenti')->with('success', 'Nuovo dipendente aggiunto con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = User::find($id);
        return view('admin.employees.showEmployee')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = User::find($id);
        return view ('admin.employees.editEmployee')->with('employee', $employee);
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

        $employee = User::find($id);
        $employee->name =  $request->get('name');
        $employee->surname = $request->get('surname');
        $employee->tel = $request->get('tel');
        $employee->CF = $request->get('CF');
        $employee->address = $request->get('address');
        $employee->num = $request->get('num');
        $employee->email = $request->get('email');
        $employee->type = $request->get('type');
        $employee->client_id = $request->get('client_id');

        $employee->save();

        return redirect('/admin/utenti')->with('success', 'Dipendente modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = User::find($id);
        $employee->delete();

        return redirect('admin/utenti')->with('success', 'Dipendente rimossoo con successo');
    }
}
