<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Panduan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panduan', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->string('image_1');
            $table->string('image_2');
            $table->string('image_3');
            $table->string('konten_title_1');
            $table->string('konten_title_2');
            $table->string('konten_title_3');
            $table->text('konten_subtitle_1');
            $table->text('konten_subtitle_2');
            $table->text('konten_subtitle_3');
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
        Schema::dropIfExists('panduan');
    }
}
