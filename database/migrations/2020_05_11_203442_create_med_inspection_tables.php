<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedInspectionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('med_inspection_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('driver_id')->unsigned();
            $table->foreign('driver_id')->references('id')->on('taxi_drivers');
            $table->string('pressure', 7);
            $table->integer('pulse');
            $table->boolean('intoxication');
            $table->float('temperature');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('med_inspection_tables');
    }
}
