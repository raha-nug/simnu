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
        Schema::create('pcnu', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pwnu');
            $table->string('nama', 255);
            $table->string('alamat', 500);
            $table->string('telp', 16);
            $table->string('email', 255)->nullable();
            $table->string('website', 255)->nullable();
            $table->string('lat', 255)->nullable();
            $table->string('long', 255)->nullable();
            $table->string('provinsi', 16);
            $table->string('kota', 16);
            $table->timestamps();

            $table->foreign('id_pwnu')->references('id')->on('pwnu')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pcnu');
    }
};
