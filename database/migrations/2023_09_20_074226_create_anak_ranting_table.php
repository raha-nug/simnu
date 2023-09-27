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
        Schema::create('anak_ranting', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_ranting');
            $table->string('nama', 255);
            $table->string('alamat', 500);
            $table->string('telp', 16)->nullable();
            $table->string('provinsi', 16);
            $table->string('kota', 16);
            $table->string('kecamatan', 16);
            $table->string('desa', 16);
            $table->timestamps();

            $table->foreign('id_ranting')->references('id')->on('ranting')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anak_ranting');
    }
};
