<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_string')->unique();
            $table->string('coordinates');
            $table->integer('minV');
            $table->integer('maxV');
            $table->integer('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('sensor_brands');
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('sensor_types');
            $table->integer('site_id')->unsigned();
            $table->foreign('site_id')->references('id')->on('sites');
        });

        DB::unprepared("ALTER TABLE `sensors` CHANGE `id` `id` INT( 4 ) UNSIGNED ZEROFILL AUTO_INCREMENT;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensors');
    }
}
