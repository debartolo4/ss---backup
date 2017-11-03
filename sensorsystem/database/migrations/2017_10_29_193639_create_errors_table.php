<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Error;

class CreateErrorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('errors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('error');
        });

        DB::unprepared("ALTER TABLE `errors` CHANGE `id` `id` INT( 17 ) UNSIGNED ZEROFILL AUTO_INCREMENT;");

        $error = new Error (['error' => 'Il dispositivo non è stato installato correttamente.']);
        $error -> save();
        $error = new Error (['error' => 'Il dispositivo non riesce ad inviare i dati.']);
        $error -> save();
        $error = new Error (['error' => 'Il dispositivo non riesce a rilevare i dati correttamente.']);
        $error -> save();
        $error = new Error (['error' => 'Il dispositivo non funziona correttamente, problema non individuato.']);
        $error -> save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('errors');
    }
}
