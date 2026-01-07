<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;

class Candidate extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'linkedin_url',
        'resume_path',
        'skills',
        'ai_analysis',
        'culture_fit_score',
        'status',
    ];

    protected $casts = [
        'skills' => 'array',
        'ai_analysis' => 'array',
        'culture_fit_score' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Get all applications from this candidate
     */
    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    /**
     * Get the candidate's full name
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Get formatted culture fit score
     */
    public function getCultureFitBadgeAttribute(): string
    {
        if (!$this->culture_fit_score) {
            return 'Not analyzed';
        }

        $score = (float) $this->culture_fit_score;

        if ($score >= 80) return 'Excellent';
        if ($score >= 60) return 'Good';
        if ($score >= 40) return 'Fair';
        return 'Poor';
    }
}
