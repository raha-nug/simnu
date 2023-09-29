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
        Schema::create('anggota', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama', 125);
            $table->string('nik', 16);
            $table->string('karta_nu', 125)->nullable();
            $table->string('no_telp', 125)->nullable();
            $table->string('email', 125)->nullable();
            $table->string('alamat', 500)->nullable();
            $table->string('provinsi', 16)->nullable();
            $table->string('kab', 16)->nullable();
            $table->string('kec', 16)->nullable();
            $table->string('desa', 16)->nullable();
            $table->string('img', 255)->default('default.jpg');
            $table->timestamps();

            $table->index('nik');
            $table->index('nama');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota');
    }
};
