<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('outbox', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('aggregate_id');
            $table->string('event_type');
            $table->json('payload');
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            $table->index(['published_at', 'created_at'], 'outbox_pending_index');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('outbox');
    }
};
