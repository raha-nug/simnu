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
        Schema::create('relasi_indikator', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('id_pwnu')->nullable();
            $table->unsignedBigInteger('id_pcnu')->nullable();
            $table->unsignedBigInteger('id_mwcnu')->nullable();
            $table->uuid('id_ranting')->nullable();
            $table->unsignedBigInteger('id_indikator')->nullable();
            $table->decimal('nilai_kurang',12)->nullable();
            $table->decimal('nilai_cukup',12)->nullable();
            $table->decimal('nilai_baik',12)->nullable();
            $table->timestamps();

            $table->foreign('id_pwnu')->references('id')->on('pwnu')->onDelete('cascade');
            $table->foreign('id_pcnu')->references('id')->on('pcnu')->onDelete('cascade');
            $table->foreign('id_mwcnu')->references('id')->on('mwcnu')->onDelete('cascade');
            $table->foreign('id_ranting')->references('id')->on('ranting')->onDelete('cascade');
            $table->foreign('id_indikator')->references('id')->on('indikator')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relasi_indikator');
    }
};
