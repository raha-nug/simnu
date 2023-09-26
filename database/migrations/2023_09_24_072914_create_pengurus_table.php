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
        Schema::create('pengurus', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('id_sk');
            $table->string('nik', 16);
            $table->string('nama', 125);
            $table->uuid('jabatan');
            $table->dateTime('mulai_jabatan');
            $table->dateTime('akhir_jabatan');
            $table->timestamps();

            $table->foreign('id_sk')->references('id')->on('surat_keputusan')->onDelete('cascade');
            $table->index('nik');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengurus');
    }
};
