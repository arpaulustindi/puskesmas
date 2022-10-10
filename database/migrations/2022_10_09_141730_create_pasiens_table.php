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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nik')->unique();
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('gender');
            $table->string('agama');
            $table->string('perkawinan');
            $table->string('pekerjaan');
            $table->string('hp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('faskes');
            $table->string('nomor_faskes')->nullable();
            $table->string('kk')->nullable();
            $table->string('kk_alamat')->nullable();
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
        Schema::dropIfExists('pasiens');
    }
};
