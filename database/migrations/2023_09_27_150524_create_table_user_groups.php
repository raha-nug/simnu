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
        Schema::create('table_user_groups', function (Blueprint $table) {
            $table->id();
            $table->string('nama_grup', 100);
            $table->unsignedBigInteger('id_pwnu')->nullable();
            $table->unsignedBigInteger('id_pcnu')->nullable();
            $table->unsignedBigInteger('id_mwcnu')->nullable();
            $table->foreignUuid('id_rantingnu')->nullable();
            $table->timestamps();

            $table->index(['nama_grup', 'id_pwnu'],'idx_pwnu_groups');
            $table->index(['nama_grup', 'id_pcnu'], 'idx_pcnu_groups');
            $table->index(['nama_grup', 'id_mwcnu'], 'idx_mwcnu_groups');
            $table->index(['nama_grup', 'id_rantingnu'], 'idx_rantingnu_groups');
            $table->foreign('id_pwnu')->references('id')->on('pwnu')->onDelete('cascade');
            $table->foreign('id_pcnu')->references('id')->on('pcnu')->onDelete('cascade');
            $table->foreign('id_mwcnu')->references('id')->on('mwcnu')->onDelete('cascade');
            $table->foreign('id_rantingnu')->references('id')->on('ranting')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_user_groups');
    }
};
