<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('paut', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paud');
            $table->year('tahun_berdiri');
            $table->string('nama_yayasan');
            $table->integer('jumlah_siswa');
            $table->integer('jumlah_guru');
            $table->unsignedBigInteger('id_kecamatan');
            $table->timestamps();

            $table->foreign('id_kecamatan')->references('id')->on('kecamatan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paut');
    }
};
