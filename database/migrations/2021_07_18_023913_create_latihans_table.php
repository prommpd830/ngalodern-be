<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLatihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_bahasa');
            $table->bigInteger('id_mapel');
            $table->bigInteger('id_level');
            $table->bigInteger('id_materi')->nullable();
            $table->string('kode_materi')->nullable();
            $table->string('tes');
            $table->string('slug');
            $table->enum('tipe', ['latihan', 'ujian']);
            $table->string('status');
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
        Schema::dropIfExists('tes');
    }
}
