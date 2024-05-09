<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeliharaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeliharaan', function (Blueprint $table) {
            $table->string('id_pemeliharaan', 10)->primary();
            $table->string('id_aset', 10);
            $table->foreign('id_aset')->references('id_aset')->on('aset');
            $table->decimal('biaya_pemeliharaan', 11);
            $table->date('tanggal_pemeliharaan');
            $table->string('keterangan', 225);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemeliharaan');
    }
}
