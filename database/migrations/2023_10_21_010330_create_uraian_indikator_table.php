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
        Schema::create('uraian_indikator', function (Blueprint $table) {
            $table->id();
            $table->string('nama_uraian', 255);
            $table->unsignedBigInteger('id_indikator')->nullable();
            $table->timestamps();

            $table->foreign('id_indikator')->references('id')->on('indikator')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uraian_indikator');
    }
};
