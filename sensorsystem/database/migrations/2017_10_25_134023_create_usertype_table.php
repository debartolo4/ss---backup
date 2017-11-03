<?php

use App\Usertype;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsertypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usertype', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->primary('id');
            $table->string('type');
        });

        $usertype = new Usertype(['id' => '1', 'type' => 'Admin']);
        $usertype -> save();
        $usertype = new Usertype(['id' => '2', 'type' => 'Responsabile Aziendale']);
        $usertype -> save();
        $usertype = new Usertype(['id' => '3', 'type' => 'Dipendente']);
        $usertype -> save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usertype');
    }
}
