<?php

namespace App\Http\Controllers;

use App\Sensor;
use App\SensorBrand;
use App\SensorType;
use App\Transmission;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class SensorController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sensors.addSensor');
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
            'longitude' => 'required|string|min:6|max:6',
            'latitude' => 'required|string|min:6|max:6',
            'minV' => 'required|string|max:5',
            'maxV' => 'required|string|max:5'
        ]);

        $sensor = new Sensor();
        $sensor->type_id =  $request->get('type_id');
        $sensor->brand_id = $request->get('brand_id');
        $sensor->id_string = SensorType::find($request->get('type_id'))->code.'-'.SensorBrand::find($request->get('brand_id'))->code;
        $sensor->coordinates = $request->get('longitude').':'.$request->get('latitude');
        $sensor->minV = $request->get('minV');
        $sensor->maxV = $request->get('maxV');
        $sensor->site_id = $request->get('site_id');

        $sensor->save();

        $sensor->id_string = SensorType::find($request->get('type_id'))->code.'-'.SensorBrand::find($request->get('brand_id'))->code.'-'.sprintf("%04d", $sensor->id);

        $sensor->save();

        return redirect('/admin/sensors')->with('success', 'Sensore installato con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sensor = Sensor::find($id);
        return view('admin.sensors.showSensor')->with('sensor', $sensor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sensor = Sensor::find($id);
        return view ('admin.sensors.editSensor')->with('sensor', $sensor);
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
            'longitude' => 'required|string|min:6|max:6',
            'latitude' => 'required|string|min:6|max:6',
            'minV' => 'required|string|max:5',
            'maxV' => 'required|string|max:5'
        ]);

        $sensor = Sensor::find($id);
        $sensor->type_id =  $request->get('type_id');
        $sensor->brand_id = $request->get('brand_id');
        $sensor->id_string = SensorType::find($request->get('type_id'))->code.'-'.SensorBrand::find($request->get('brand_id'))->code;
        $sensor->coordinates = $request->get('longitude').':'.$request->get('latitude');
        $sensor->minV = $request->get('minV');
        $sensor->maxV = $request->get('maxV');
        $sensor->site_id = $request->get('site_id');

        $sensor->save();

        $sensor->id_string = SensorType::find($request->get('type_id'))->code.'-'.SensorBrand::find($request->get('brand_id'))->code.'-'.sprintf("%04d", $sensor->id);

        $sensor->save();

        return redirect('/admin/sensors')->with('success', 'Sensore modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sensor = Sensor::find($id);
        DB::delete('DELETE FROM transmission_data WHERE sensor_id = '.$id.';');
        $transmissions = Transmission::all();
        foreach ($transmissions as $tr) {
            if(substr($tr->trans_string, 8, 4) == $id){
                $tr->delete();
            }
        }

        $sensor->delete();

        return redirect('admin/sensors')->with('success', 'Sensore rimosso con successo');
    }
}
