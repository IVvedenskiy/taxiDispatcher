<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarTable extends Migration
{
    public function up()
    {
        Schema::create('car', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number');
            $table->string('mark');
            $table->string('model');
            $table->tinyInteger('seatsNumber');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('car');
    }
}
