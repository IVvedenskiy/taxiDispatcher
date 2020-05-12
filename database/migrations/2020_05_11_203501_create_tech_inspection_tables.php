<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechInspectionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tech_inspection_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('driver_id')->unsigned();
            $table->foreign('driver_id')->references('id')->on('taxi_drivers');
            $table->boolean('insurance');
            $table->boolean('license');
            $table->boolean('brakes');
            $table->boolean('steering');
            $table->boolean('engine');
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
        Schema::dropIfExists('tech_inspection_tables');
    }
}
