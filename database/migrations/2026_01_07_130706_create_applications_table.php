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
            $table->foreignId('job_id')->constrained()->cascadeOnDelete();
            $table->foreignId('candidate_id')->constrained()->cascadeOnDelete();
            $table->enum('stage', [
                'applied',
                'screening',
                'phone_interview',
                'technical_interview',
                'hr_interview',
                'offer',
                'hired',
                'rejected',
                'withdrawn'
            ])->default('applied');
            $table->integer('stage_order')->default(0); // For Kanban board ordering
            $table->text('cover_letter')->nullable();
            $table->json('interview_notes')->nullable(); // Array of notes from different interviews
            $table->decimal('offered_salary', 10, 2)->nullable();
            $table->string('offered_salary_currency', 3)->default('USD');
            $table->date('start_date')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->text('rejection_reason')->nullable();
            $table->timestamp('applied_at')->useCurrent();
            $table->timestamp('last_activity_at')->useCurrent();
            $table->foreignId('assigned_to')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['job_id', 'candidate_id']);
            $table->index(['job_id', 'stage']);
            $table->index('applied_at');
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
