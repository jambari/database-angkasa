<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Checklistbmkgsofts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklistbmkgsofts', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal')->unique();
            $table->boolean('obs')->default(0);
            $table->boolean('hilman')->default(0);
            $table->char('keterangan', 255)->nullable();
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
        Schema::dropIfExists('checklistbmkgsofts');
    }
}
