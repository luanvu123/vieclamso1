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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();

            $table->foreignId('candidate_id')->constrained('candidates')->onDelete('cascade');
            $table->foreignId('job_posting_id')->constrained('job_postings')->onDelete('cascade');
            $table->foreignId('cv_id')->nullable()->constrained('cvs')->onDelete('set null'); // Bảng CV viết đúng như tên model
            $table->string('cv_path')->nullable();
            $table->string('cv_path_hidden_info')->nullable();
            $table->text('introduction')->nullable();
            $table->enum('status', ['pending', 'reviewed', 'accepted', 'rejected'])->default('pending');

            $table->foreignId('order_id')->nullable()->constrained('orders')->onDelete('set null');

            $table->enum('approve_application', ['Chờ duyệt', 'Đã duyệt', 'Nộp lại', 'Từ chối'])->default('Chờ duyệt');
            $table->string('cv_path_resubmit')->nullable();
            $table->text('summary')->nullable();

            $table->boolean('saved')->default(false);

            $table->timestamps();

            // Không cho nộp trùng công việc
            $table->unique(['candidate_id', 'job_posting_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};



