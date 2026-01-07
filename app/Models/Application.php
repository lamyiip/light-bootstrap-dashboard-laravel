<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'job_id',
        'candidate_id',
        'stage',
        'stage_order',
        'interview_notes',
        'assigned_to',
    ];

    protected $casts = [
        'interview_notes' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Available application stages
     */
    public const STAGES = [
        'applied' => 'Applied',
        'screening' => 'Screening',
        'phone_interview' => 'Phone Interview',
        'technical_interview' => 'Technical Interview',
        'hr_interview' => 'HR Interview',
        'offer' => 'Offer',
        'hired' => 'Hired',
        'rejected' => 'Rejected',
        'withdrawn' => 'Withdrawn',
    ];

    /**
     * Get the job for this application
     */
    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }

    /**
     * Get the candidate for this application
     */
    public function candidate(): BelongsTo
    {
        return $this->belongsTo(Candidate::class);
    }

    /**
     * Get the user assigned to this application
     */
    public function assignedTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    /**
     * Get the stage label
     */
    public function getStageLabelAttribute(): string
    {
        return self::STAGES[$this->stage] ?? $this->stage;
    }

    /**
     * Get badge color for stage
     */
    public function getStageBadgeColorAttribute(): string
    {
        return match($this->stage) {
            'applied' => 'bg-blue-100 text-blue-800',
            'screening' => 'bg-yellow-100 text-yellow-800',
            'phone_interview', 'technical_interview', 'hr_interview' => 'bg-purple-100 text-purple-800',
            'offer' => 'bg-green-100 text-green-800',
            'hired' => 'bg-green-600 text-white',
            'rejected' => 'bg-red-100 text-red-800',
            'withdrawn' => 'bg-gray-100 text-gray-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }
}
