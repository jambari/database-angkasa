<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGempabumis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gempabumis', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->time('waktu');
            $table->float('lintang');
            $table->decimal('bujur',5,2);
            $table->decimal('magnitudo',2,1);
            $table->integer('kedalaman');
            $table->text('lokasi');
            $table->boolean('terasa')->default(false);
            $table->text('dirasakan')->nullable();
            $table->float('pga_z')->nullable(0);
            $table->float('pga_ns')->nulable(0);
            $table->float('pga_ew')->nullable(0);
            $table->char('sumber');
            $table->unique(array('tanggal', 'waktu','sumber'));
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
        Schema::dropIfExists('gempabumis');
    }
}
