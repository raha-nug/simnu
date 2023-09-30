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
        Schema::create('table_user_credentials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_grup');
            $table->boolean('can_update');
            $table->boolean('can_create');
            $table->boolean('can_delete');
            $table->boolean('can_manage_user');
            $table->timestamps();

            $table->foreign('id_grup')->references('id')->on('table_user_groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_user_credentials');
    }
};
