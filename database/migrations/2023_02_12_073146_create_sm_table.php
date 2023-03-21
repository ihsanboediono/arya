<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sm', function (Blueprint $table) {
            $table->id('id_sm');
            $table->date('tgl_sm');
            $table->string('no_sm');
            $table->string('pengirim');
            $table->string('perihal');
            $table->string('ket_sm');
            $table->string('file_sm');
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
        Schema::dropIfExists('sm');
    }
};
