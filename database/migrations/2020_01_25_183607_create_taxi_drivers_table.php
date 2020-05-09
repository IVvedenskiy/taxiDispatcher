<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxiDriversTable extends Migration
{
    public function up()
    {
        Schema::create('taxi_drivers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullName');
            $table->string('callSign');
            $table->string('phoneNumber');
            $table->string('status');
            $table->string('car');
//            $table->integer('car_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('taxi_drivers');
    }
}
