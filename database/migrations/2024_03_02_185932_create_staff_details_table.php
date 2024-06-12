<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('staff_details', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->string('name');
            $table->string('gender');
            $table->date('dob');
            $table->string('mobile');
            $table->date('joining_date');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->bigInteger('salary');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('staff_details');
    }
}