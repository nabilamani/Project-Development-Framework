<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aset', function (Blueprint $table) {
            $table->string('id_aset', 10)->primary();
            $table->string('nama_aset', 50);
            $table->enum('kategori', ['Alat Kantor','Perlengkapan Kantor','Kendaraan','Tanah','Bangunan']);
            $table->enum('kondisi', ['Baik', 'Butuh Perbaikan', 'Rusak Total']);
            $table->enum('status', ['Ada', 'Dipinjam', 'Hilang']);
            $table->string('lokasi', 225);
            $table->decimal('nilai', 11);
            $table->year('tahun_perolehan');
            $table->string('deskripsi', 225);
            $table->string('gambar', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aset');
    }
}