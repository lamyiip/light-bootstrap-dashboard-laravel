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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('portfolio_url')->nullable();
            $table->text('summary')->nullable();
            $table->string('resume_path')->nullable();
            $table->integer('years_of_experience')->nullable();
            $table->json('ai_analysis')->nullable(); // Stores AI-generated insights
            $table->decimal('culture_fit_score', 3, 2)->nullable(); // 0.00 to 100.00
            $table->json('skills')->nullable(); // Array of skills
            $table->enum('status', ['active', 'inactive', 'blacklisted'])->default('active');
            $table->string('current_company')->nullable();
            $table->string('current_position')->nullable();
            $table->decimal('desired_salary', 10, 2)->nullable();
            $table->string('desired_salary_currency', 3)->default('USD');
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['email', 'status']);
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
