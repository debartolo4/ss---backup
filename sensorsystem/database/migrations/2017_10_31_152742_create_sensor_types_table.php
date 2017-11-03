<?php

use App\SensorType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor_types', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('type')->unique();
            $table->string('code')->unique();
        });

        $type = new SensorType(['type' => 'Temperatura', 'code' => 'TMP']);
        $type->save();
        $type = new SensorType(['type' => 'Capacità', 'code' => 'CPC']);
        $type->save();
        $type = new SensorType(['type' => 'Pressione', 'code' => 'PRS']);
        $type->save();
        $type = new SensorType(['type' => 'Gas', 'code' => 'GAS']);
        $type->save();
        $type = new SensorType(['type' => 'Corrente elettrica', 'code' => 'CUR']);
        $type->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensor_types');
    }
}
