<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::withCount('applications')
            ->latest()
            ->paginate(15);

        return view('jobs.index', compact('jobs'));
    }

    public function show(Job $job)
    {
        $job->load('applications.candidate');

        return view('jobs.show', compact('job'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'department' => 'nullable|max:255',
            'location' => 'nullable|max:255',
            'type' => 'required|in:full-time,part-time,contract,internship',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0',
            'status' => 'required|in:draft,published,closed',
        ]);

        $validated['created_by'] = auth()->id();

        Job::create($validated);

        return redirect()->route('jobs.index')->with('success', 'Job created successfully.');
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'department' => 'nullable|max:255',
            'location' => 'nullable|max:255',
            'type' => 'required|in:full-time,part-time,contract,internship',
            'salary_min' => 'nullable|numeric|min:0',
            'salary_max' => 'nullable|numeric|min:0',
            'status' => 'required|in:draft,published,closed',
        ]);

        $job->update($validated);

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully.');
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
    }
}
