<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurements', function (Blueprint $table) {
            $table->id();
            
            
            $table->string('lambai')->nullable(); // Add columns for measurements
            $table->string('tera')->nullable();
            $table->string('bazu')->nullable();
            $table->string('kundah')->nullable();
            $table->string('galeh')->nullable();
            $table->string('chest')->nullable();
            $table->string('kamar')->nullable();
            $table->string('chest_tayyar')->nullable();
            $table->string('kamartiyaar')->nullable();
            $table->string('gohire_tayyar')->nullable();
            $table->string('shalwar_lambai')->nullable();
            $table->string('panche')->nullable();
            $table->string('chokor_ghera')->nullable();
            $table->string('gol_ghera')->nullable();
            $table->string('baba_bazu')->nullable();
            $table->string('kaff')->nullable();
            $table->string('lambai_kot')->nullable();
            $table->string('hip')->nullable();
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
        Schema::dropIfExists('measurements');
    }
}
