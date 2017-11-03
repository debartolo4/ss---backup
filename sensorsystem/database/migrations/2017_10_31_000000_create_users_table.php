<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('surname');
            $table->string('address');
            $table->string ('num');
            $table->string('tel');
            $table->string('CF');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('type')->unsigned();
            $table->foreign('type')->references('id')->on('usertype');
            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('customers');
            $table->tinyInteger('firstLog')->nullable();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
