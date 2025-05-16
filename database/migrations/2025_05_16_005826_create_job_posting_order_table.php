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
        Schema::create('job_posting_order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_posting_id')->constrained()->onDelete('cascade');
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('order_detail_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();

            // Ensure a job posting can only use an order detail once
            $table->unique(['job_posting_id', 'order_detail_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_posting_order');
    }
};
