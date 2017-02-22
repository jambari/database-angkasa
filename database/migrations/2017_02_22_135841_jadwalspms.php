<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Jadwalspms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwalspms', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal')->unique();
            $table->string('kegiatan');
            $table->boolean('status')->default(0);
            $table->char('petugas',50)->nullable();
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
        Schema::dropIfExists('jadwalspms');
    }
}
