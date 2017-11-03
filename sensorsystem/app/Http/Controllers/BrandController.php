<?php

namespace App\Http\Controllers;

use App\SensorBrand;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BrandController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sensors.addBrand');
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
            'brand' => 'required|unique:sensor_brands',
            'code' => 'required|min:3|max:3|string|unique:sensor_brands',
        ]);

        $brand = new SensorBrand();
        $brand->brand = $request->get('brand');
        $brand->code = $request->get('code');
        $brand->save();

        return redirect('/admin/sensors/installableSensors')->with('success', 'Nuova marca aggiunta con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = SensorBrand::find($id);
        $brand->delete();

        return redirect('admin/sensors/deleteBrandType')->with('success', 'Marca rimossa con successo');
    }
}
