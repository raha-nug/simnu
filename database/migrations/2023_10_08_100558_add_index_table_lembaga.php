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
        Schema::table('lembaga', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pwnu')->nullable()->change();
            $table->unsignedBigInteger('id_pcnu')->nullable()->change();
            $table->unsignedBigInteger('id_mwcnu')->nullable()->change();
            $table->string('alamat', 500)->nullable()->change();
            $table->string('provinsi', 16)->nullable()->change();
            $table->string('kota', 16)->nullable()->change();
            $table->string('kecamatan', 16)->nullable()->change();
            $table->unsignedBigInteger('master_id');

            $table->foreign('master_id','fk_mst_lembaga')->references('id')->on('master_lembaga')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lembaga', function (Blueprint $table) {
            $table->dropForeign('fk_mst_lembaga');

            $table->dropColumn('master_id');
        });
    }
};
