<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('notifications_id')->constrained()->cascadeOnDelete();
            $table->foreignUuid('recipient_id')->constrained('users')->cascadeOnDelete();
            $table->string('provider');
            $table->string('status')->default('queued');
            $table->unsignedSmallInteger('attempts')->default(0);
            $table->text('last_error')->nullable();
            $table->string('provider_message_id')->nullable();
            $table->timestamps('sent_at')->nullable();
            $table->timestamps('delivered_at')->nullable();
            $table->timestamps();

            $table->unique(['notification_id', 'recipient_id', 'channel'], 'deliveries_dedup_unique');
            $table->index(['status'], 'deliveries_status_index');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deliveries');
    }
};
