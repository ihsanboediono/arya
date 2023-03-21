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
        Schema::create('pinjam_invents', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pinjam');
            $table->string('peminjam');
            $table->string('file_pinjam');
            $table->integer('status_kembali');
            $table->date('tgl_kembali');
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
        Schema::dropIfExists('pinjam_invents');
    }
};
