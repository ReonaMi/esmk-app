<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaliKelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wali_kelas', function (Blueprint $table) {
            $table->bigIncrements('id_wali_kelas');
            $table->unsignedBigInteger('id_kelas_ref');
            $table->unsignedBigInteger('id_guru_ref');
            $table->timestamps();

            $table->foreign('id_kelas_ref')
                ->references('id_kelas')
                ->on('kelas')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('id_guru_ref')
                ->references('id_guru')
                ->on('guru')
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
        Schema::dropIfExists('wali_kelas');
    }
}
