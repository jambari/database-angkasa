<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Prekursors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prekursors', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->float('polarisasi')->nullable();
            $table->float('stdplus')->nullable();
            $table->float('stdminus')->nullable();
            $table->float('dstindex')->nullable();
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
        Schema::dropIfExists('prekursors');
    }
}
