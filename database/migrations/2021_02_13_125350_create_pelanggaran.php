<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelanggaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggaran', function (Blueprint $table) {
            $table->bigIncrements('id_pelanggaran');
            $table->unsignedBigInteger('id_siswa_ref');
            $table->integer('nilai_pelanggaran');
            $table->text('deskripsi_pelanggaran');
            $table->timestamps();

            $table->foreign('id_siswa_ref')
                ->references('id_siswa')
                ->on('siswa')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelanggaran');
    }
}
