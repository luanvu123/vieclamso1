<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropColumn([
                'Time_to_display',
                'Featured_job',
                'job_suggestions',
                'job_suggestion_cv',
                'job_suggestion_related',
                'job_suggestion_top',
                'Top_Job_Alert',
                'prime_time',
                'regular_time',
                'AI_powered_CV',
                'Top_Add_ons',
                'Advanced_news_headline',
                'Add_on_visual',
                'Service_Warranty',
                'search_results',
                'Top_Add_ons_in_2',
                'Activate_CV_proposal',
                'Give_350_Credits',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->string('Time_to_display')->nullable();
            $table->string('Featured_job')->nullable();
            $table->string('job_suggestions')->nullable();
            $table->string('job_suggestion_cv')->nullable();
            $table->string('job_suggestion_related')->nullable();
            $table->string('job_suggestion_top')->nullable();
            $table->boolean('Top_Job_Alert')->default(false);
            $table->string('prime_time')->nullable();
            $table->string('regular_time')->nullable();
            $table->boolean('AI_powered_CV')->default(false);
            $table->boolean('Top_Add_ons')->default(false);
            $table->boolean('Advanced_news_headline')->default(false);
            $table->boolean('Add_on_visual')->default(false);
            $table->string('Service_Warranty')->nullable();
            $table->boolean('search_results')->default(false);
            $table->boolean('Top_Add_ons_in_2')->default(false);
            $table->boolean('Activate_CV_proposal')->default(false);
            $table->boolean('Give_350_Credits')->default(false);
        });
    }
};
