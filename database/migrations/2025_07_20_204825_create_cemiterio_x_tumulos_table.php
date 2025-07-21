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
        Schema::create('cemiterio_x_tumulos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cemiterio_id');
            $table->foreignId('tumulo_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cemiterio_x_tumulos');
    }
};
