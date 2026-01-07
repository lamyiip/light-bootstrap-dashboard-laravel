<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Candidate;
use App\Models\Application;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_jobs' => Job::count(),
            'active_jobs' => Job::where('status', 'published')->count(),
            'total_candidates' => Candidate::count(),
            'total_applications' => Application::count(),
            'applications_by_stage' => Application::selectRaw('stage, COUNT(*) as count')
                ->groupBy('stage')
                ->get()
                ->pluck('count', 'stage'),
        ];

        $recent_applications = Application::with(['candidate', 'job'])
            ->latest()
            ->limit(5)
            ->get();

        $recent_jobs = Job::where('status', 'published')
            ->latest()
            ->limit(5)
            ->get();

        return view('dashboard', compact('stats', 'recent_applications', 'recent_jobs'));
    }
}
