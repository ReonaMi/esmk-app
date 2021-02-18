<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMataPelajaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mata_pelajaran', function (Blueprint $table) {
            $table->bigIncrements('id_mapel');
            $table->unsignedBigInteger('id_guru_ref');
            $table->string('mata_pelajaran');
            $table->string('nama_pelajaran');
            $table->unsignedBigInteger('id_jurusan_ref')->nullable();
            $table->timestamps();

            $table->foreign('id_guru_ref')
                ->references('id_guru')
                ->on('guru')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('id_jurusan_ref')
                ->references('id_jurusan')
                ->on('jurusan')
                ->onUpdate('set null')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mata_pelajaran');
    }
}
