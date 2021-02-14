<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->bigIncrements('id_admin');
            $table->string('nama_admin');
            $table->string('email_admin')->unique();
            $table->string('password');
            $table->string('wewenang');
            $table->text('deskripsi_admin')->nullable();
            $table->unsignedBigInteger('id_jurusan_ref')->nullable();
            $table->timestamps();

            $table->foreign('id_jurusan_ref')
                ->references('id_jurusan')
                ->on('jurusan')
                ->onDelete('set null')
                ->onUpdate('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
