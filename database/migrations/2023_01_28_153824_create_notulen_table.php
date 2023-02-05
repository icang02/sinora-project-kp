<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotulenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notulen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rapat_id');
            $table->string('notulis')->nullable();
            $table->string('nip')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('pangkat')->nullable();
            $table->text('pembahasan')->nullable();
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
        Schema::dropIfExists('notulen');
    }
}
