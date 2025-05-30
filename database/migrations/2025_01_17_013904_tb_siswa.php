<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('master_kelas_id')->references('id')->on('master_kelas')->cascadeOnDelete(); ///relasi table siswa dengan kelas
            $table->integer('umur');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('tb_siswa');
    }
};
