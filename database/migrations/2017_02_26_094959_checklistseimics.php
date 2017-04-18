<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Checklistseimics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklistseismics', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal')->unique();
            $table->char('geni',8)->nullable();
            $table->char('jay',8)->nullable();
            $table->char('mmpi',8)->nullable();
            $table->char('wami',8)->nullable();
            $table->char('average')->nullable();
            $table->char('petugas')->nullable();
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
        Schema::dropIfExists('checklistseismics');
    }
}
