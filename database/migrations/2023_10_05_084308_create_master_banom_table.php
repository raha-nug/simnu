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
        Schema::create('master_banom', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_banom_basis');
            $table->string('nama_banom');
            $table->timestamps();

            $table->foreign('id_banom_basis')->references('id')->on('banom_basis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_banom');
    }
};
