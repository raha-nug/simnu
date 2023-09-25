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
        Schema::create('pwnu',function (Blueprint $table) {
            $table->id();
            $table->string('nama', 255);
            $table->string('alamat', 500);
            $table->string('telp', 16);
            $table->string('email', 255);
            $table->string('website', 255)->nullable();
            $table->string('lat', 255)->nullable();
            $table->string('long', 255)->nullable();
            $table->string('provinsi', 16);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pwnu');
    }
};
