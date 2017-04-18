<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Checklistlds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklistlds', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal')->unique();
            $table->boolean('jam01')->nullable();
            $table->boolean('jam02')->nullable();
            $table->boolean('jam03')->nullable();
            $table->boolean('jam04')->nullable();
            $table->boolean('jam05')->nullable();
            $table->boolean('jam06')->nullable();
            $table->boolean('jam07')->nullable();
            $table->boolean('jam08')->nullable();
            $table->boolean('jam09')->nullable();
            $table->boolean('jam10')->nullable();
            $table->boolean('jam11')->nullable();
            $table->boolean('jam12')->nullable();
            $table->boolean('jam13')->nullable();
            $table->boolean('jam14')->nullable();
            $table->boolean('jam15')->nullable();
            $table->boolean('jam16')->nullable();
            $table->boolean('jam17')->nullable();
            $table->boolean('jam18')->nullable();
            $table->boolean('jam19')->nullable();
            $table->boolean('jam20')->nullable();
            $table->boolean('jam21')->nullable();
            $table->boolean('jam22')->nullable();
            $table->boolean('jam23')->nullable();
            $table->boolean('jam24')->nullable();
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
        Schema::dropIfExists('checklistlds');
    }
}
