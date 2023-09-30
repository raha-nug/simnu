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
        Schema::create('table_users', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 255);
            $table->string('email', 255);
            $table->string('no_telp', 16)->nullable();
            $table->string('password', 255);
            $table->string('nik', 16)->nullable();
            $table->string('provinsi', 16)->nullable();
            $table->string('kota', 16)->nullable();
            $table->string('kecamatan', 16)->nullable();
            $table->string('desa', 16)->nullable();
            $table->boolean('is_whatsapp');
            $table->unsignedBigInteger('id_grup');

            $table->index('nik');
            $table->foreign('id_grup')->references('id')->on('table_user_groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_users');
    }
};
