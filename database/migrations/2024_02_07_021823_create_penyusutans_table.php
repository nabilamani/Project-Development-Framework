<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyusutansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyusutan', function (Blueprint $table) {
            $table->string('id_penyusutan', 10)->primary();
            $table->string('id_aset', 10);
            $table->foreign('id_aset')->references('id_aset')->on('aset');
            $table->decimal('biaya_perolehan', 11);
            $table->decimal('nilai_residu', 11);
            $table->decimal('umur_manfaat', 3);
            $table->decimal('biaya_perolehanDep', 11);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penyusutans');
    }
}
