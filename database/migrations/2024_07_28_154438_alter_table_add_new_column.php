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
        Schema::table('banom', function (Blueprint $table) {
            $table->foreignUuid('id_ranting')->nullable();

            $table->foreign('id_ranting')->references('id')->on('ranting')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('banom', function (Blueprint $table) {
            //
        });
    }
};
