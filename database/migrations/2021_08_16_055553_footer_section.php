<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FooterSection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('footer_section', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('deskripsi_1');
            $table->text('deskripsi_2')->nullable();
            $table->string('telepon')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('footer_section');
    }
}
