<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('tenant_id')->constrained()->cascadeOnDelete();
            $table->string('idempotency_id');
            $table->string('category');
            $table->string('priority')->default('normal');
            $table->string('template_key');
            $table->json('payload');
            $table->string('target_type')->default('user');
            $table->string('status')->default('pending');

            $table->timestamps();

            $table->unique(['tenant_id', 'idempotency_key'], 'notifications_tenant_idempotency_unique');
            $table->index(['status', 'scheduled_at', 'notifications_status_scheduled)index']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
