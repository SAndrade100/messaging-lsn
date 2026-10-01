<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_preferences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('category');
            $table->string('channel');
            $table->boolean('enabled')->default(true);
            $table->string('quiet_hours_start', 5)->nullable();
            $table->string('quiet_hours_end', 5)->nullable();
            $table->string('timezone')->default('America/Sao_Paulo');
            $table->timestamps();

            $table->unique(['user_id', 'category', 'channel'], 'user_preferences_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_preferences');
    }
};
