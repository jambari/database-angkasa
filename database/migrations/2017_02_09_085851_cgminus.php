<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cgminus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cgminus', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal')->unique();
            $table->integer('jam00')->nullable();
            $table->integer('jam01')->nullable();
            $table->integer('jam02')->nullable();
            $table->integer('jam03')->nullable();
            $table->integer('jam04')->nullable();
            $table->integer('jam05')->nullable();
            $table->integer('jam06')->nullable();
            $table->integer('jam07')->nullable();
            $table->integer('jam08')->nullable();
            $table->integer('jam09')->nullable();
            $table->integer('jam10')->nullable();
            $table->integer('jam11')->nullable();
            $table->integer('jam12')->nullable();
            $table->integer('jam13')->nullable();
            $table->integer('jam14')->nullable();
            $table->integer('jam15')->nullable();
            $table->integer('jam16')->nullable();
            $table->integer('jam17')->nullable();
            $table->integer('jam18')->nullable();
            $table->integer('jam19')->nullable();
            $table->integer('jam20')->nullable();
            $table->integer('jam21')->nullable();
            $table->integer('jam22')->nullable();
            $table->integer('jam23')->nullable();
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
        Schema::dropIfExists('cgminus');
    }
}
