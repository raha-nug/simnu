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
        Schema::create('banom', function (Blueprint $table) {
            $table->uuid('id');
            $table->unsignedBigInteger('id_pwnu');
            $table->unsignedBigInteger('id_pcnu');
            $table->unsignedBigInteger('id_mwcnu');
            $table->string('nama', 255);
            $table->string('alamat', 500);
            $table->string('telp', 16)->nullable();
            $table->string('provinsi', 16);
            $table->string('kota', 16);
            $table->string('kecamatan', 16);
            $table->timestamps();

            $table->foreign('id_pwnu')->references('id')->on('pwnu')->onDelete('cascade');
            $table->foreign('id_pcnu')->references('id')->on('pcnu')->onDelete('cascade');
            $table->foreign('id_mwcnu')->references('id')->on('mwcnu')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banom');
    }
};
