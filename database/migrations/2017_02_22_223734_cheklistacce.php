<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cheklistacce extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklistacces', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal')->unique();
            $table->boolean('Z')->default(1);
            $table->boolean('NS')->default(1);
            $table->boolean('EW')->default(1);
            $table->boolean('modem')->default(1);
            $table->boolean('power')->default(1);
            $table->float('tegangan_ups')->nullable();
            $table->float('temperatur')->nullable();
            $table->string('petugas')->nullable();
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
        Schema::dropIfExists('checklistacces');
    }
}
