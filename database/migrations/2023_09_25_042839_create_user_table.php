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
        Schema::create('user', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('email',255);
            $table->string('password',255);
            $table->unsignedBigInteger('id_user_group');
            $table->unsignedBigInteger('id_pcnu');
            $table->unsignedBigInteger('id_mwcnu');
            $table->uuid('id_lembaga');
            $table->uuid('id_banom');
            $table->uuid('id_ranting');
            $table->uuid('id_anak_ranting');
            $table->timestamps();

            $table->foreign('id_pcnu')->references('id')->on('pcnu')->onDelete('cascade');
            $table->foreign('id_mwcnu')->references('id')->on('mwcnu')->onDelete('cascade');
            $table->foreign('id_ranting')->references('id')->on('ranting')->onDelete('cascade');
            $table->foreign('id_anak_ranting')->references('id')->on('anak_ranting')->onDelete('cascade');
            $table->foreign('id_lembaga')->references('id')->on('lembaga')->onDelete('cascade');
            $table->foreign('id_banom')->references('id')->on('banom')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
