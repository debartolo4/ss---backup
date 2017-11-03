<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransmissionDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transmission_data', function (Blueprint $table) {
            $table->integer('id_trans')->unsigned();
            $table->primary('id_trans');
            $table->foreign('id_trans')->references('id')->on('transmissions');
            $table->date('date')->nullable();
            $table->string('time')->nullable();
            $table->integer('val')->nullable();
            $table->integer('sensor_id')->unsigned();
            $table->foreign('sensor_id')->references('id')->on('sensors');
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('sensor_types');
            $table->integer('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('sensor_brands');
            $table->integer('site_id')->unsigned();
            $table->foreign('site_id')->references('id')->on('sites');
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('customers');
            $table->integer('error_id')->unsigned();
            $table->foreign('error_id')->references('id')->on('errors');
            $table->string('message');
        });


        DB::unprepared("ALTER TABLE `transmission_data` CHANGE `error_id` `error_id` INT( 17 ) UNSIGNED ZEROFILL NULL;");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transmission_data');
    }
}
