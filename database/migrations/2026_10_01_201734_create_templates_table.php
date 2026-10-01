<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->string('key');
            $table->unsignedInteger('version')->default(1);
            $table->string('channel');
            $table->string('locale', 5)->default('pt-BR');
            $table->string('subject')->nullable();
            $table->text('body');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['key', 'version', 'channel', 'locale'], 'template_key_version_channel_locale_unique');

            $table->index(['key', 'channel', 'locale', 'is_active'], 'templates_lookup_index');
        });
    }

    public function down(): void
    {    /**
     * Reverse the migrations.
     */
        Schema::dropIfExists('templates');
    }
};
