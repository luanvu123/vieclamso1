<?php
// Create migration: php artisan make:migration fix_cv_tables_schema

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // First, add missing columns to cvs table
        Schema::table('cvs', function (Blueprint $table) {
            if (!Schema::hasColumn('cvs', 'file_size')) {
                $table->bigInteger('file_size')->nullable()->after('cv_path');
            }
            if (!Schema::hasColumn('cvs', 'file_type')) {
                $table->string('file_type', 10)->nullable()->after('file_size');
            }
            if (!Schema::hasColumn('cvs', 'original_name')) {
                $table->string('original_name')->nullable()->after('cv_name');
            }
        });

        // Make sure candidate_cv pivot table has correct structure
        if (!Schema::hasTable('candidate_cv')) {
            Schema::create('candidate_cv', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('candidate_id');
                $table->unsignedBigInteger('cv_id');
                $table->boolean('is_primary')->default(false);
                $table->boolean('is_active')->default(true);
                $table->timestamps();

                $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
                $table->foreign('cv_id')->references('id')->on('cvs')->onDelete('cascade');

                // Ensure only one primary CV per candidate
                $table->unique(['candidate_id', 'is_primary'], 'unique_primary_cv');
            });
        } else {
            // Add missing columns to existing candidate_cv table
            Schema::table('candidate_cv', function (Blueprint $table) {
                if (!Schema::hasColumn('candidate_cv', 'is_primary')) {
                    $table->boolean('is_primary')->default(false)->after('cv_id');
                }
                if (!Schema::hasColumn('candidate_cv', 'is_active')) {
                    $table->boolean('is_active')->default(true)->after('is_primary');
                }
            });
        }
    }

    public function down()
    {
        Schema::table('cvs', function (Blueprint $table) {
            $table->dropColumn(['file_size', 'file_type', 'original_name']);
        });

        Schema::dropIfExists('candidate_cv');
    }
};
