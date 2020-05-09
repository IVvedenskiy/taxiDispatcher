<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaxiDriverTable extends Migration
{
    public function up()
    {
        Schema::create('taxiDriver', function (Blueprint $table) {
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
        Schema::dropIfExists('taxiDriver');
    }
}
