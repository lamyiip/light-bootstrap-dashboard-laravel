<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Job;
use App\Models\Candidate;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::with(['job', 'candidate', 'assignedTo'])
            ->latest()
            ->paginate(15);

        $stages = Application::STAGES;

        return view('applications.index', compact('applications', 'stages'));
    }

    public function show(Application $application)
    {
        $application->load(['job', 'candidate', 'assignedTo']);

        return view('applications.show', compact('application'));
    }

    public function create()
    {
        $jobs = Job::where('status', 'published')->get();
        $candidates = Candidate::where('status', 'active')->get();
        $stages = Application::STAGES;

        return view('applications.create', compact('jobs', 'candidates', 'stages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'job_id' => 'required|exists:jobs,id',
            'candidate_id' => 'required|exists:candidates,id',
            'stage' => 'required|in:' . implode(',', array_keys(Application::STAGES)),
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        Application::create($validated);

        return redirect()->route('applications.index')->with('success', 'Application created successfully.');
    }

    public function edit(Application $application)
    {
        $jobs = Job::all();
        $candidates = Candidate::all();
        $stages = Application::STAGES;

        return view('applications.edit', compact('application', 'jobs', 'candidates', 'stages'));
    }

    public function update(Request $request, Application $application)
    {
        $validated = $request->validate([
            'stage' => 'required|in:' . implode(',', array_keys(Application::STAGES)),
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $application->update($validated);

        return redirect()->route('applications.index')->with('success', 'Application updated successfully.');
    }

    public function destroy(Application $application)
    {
        $application->delete();

        return redirect()->route('applications.index')->with('success', 'Application deleted successfully.');
    }
}
