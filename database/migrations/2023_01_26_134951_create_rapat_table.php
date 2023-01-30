<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRapatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rapat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_rapat_id');
            $table->string('kode')->unique();
            $table->string('nama');
            $table->string('slug');
            $table->string('ruang');
            $table->string('pengisi_rapat')->nullable();
            // $table->integer('jumlah_peserta')->nullable();
            $table->string('pimpinan_rapat')->nullable();
            $table->date('tanggal');
            $table->string('mulai');
            $table->string('selesai');
            $table->enum('status', ['belum dimulai', 'sedang berjalan', 'selesai'])->default('belum dimulai');
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
        Schema::dropIfExists('rapat');
    }
}
