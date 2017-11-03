<?php

use App\SensorBrand;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor_brands', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('brand')->unique();
            $table->string('code')->unique();
        });

        $brand = new SensorBrand(['brand' => 'Samsung', 'code' => 'SMS']);
        $brand->save();
        $brand = new SensorBrand(['brand' => 'Philips', 'code' => 'PLS']);
        $brand->save();
        $brand = new SensorBrand(['brand' => 'LG', 'code' => 'LGG']);
        $brand->save();
        $brand = new SensorBrand(['brand' => 'Sony', 'code' => 'SNY']);
        $brand->save();
        $brand = new SensorBrand(['brand' => 'EPSON', 'code' => 'EPS']);
        $brand->save();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensor_brands');
    }
}
