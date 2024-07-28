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
        Schema::table('anak_ranting', function (Blueprint $table) {
            $table->string('website')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anak_ranting', function (Blueprint $table) {
            $table->dropColumn('website');
            $table->dropColumn('lat');
            $table->dropColumn('long');
        });
    }
};
