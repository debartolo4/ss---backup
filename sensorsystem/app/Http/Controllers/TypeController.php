<?php

namespace App\Http\Controllers;

use App\SensorType;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TypeController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sensors.addType');
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
            'type' => 'required|unique:sensor_types',
            'code' => 'required|min:3|max:3|string|unique:sensor_types',
        ]);

        $type = new SensorType();
        $type->type = $request->get('type');
        $type->code = $request->get('code');
        $type->save();

        return redirect('/admin/sensors/installableSensors')->with('success', 'Nuovo tipo aggiunto con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = SensorType::find($id);
        $type->delete();

        return redirect('admin/sensors/deleteBrandType')->with('success', 'Tipo rimosso con successo');
    }
}
