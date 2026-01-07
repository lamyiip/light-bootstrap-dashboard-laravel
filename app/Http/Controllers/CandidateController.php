<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index()
    {
        $candidates = Candidate::withCount('applications')
            ->latest()
            ->paginate(15);

        return view('candidates.index', compact('candidates'));
    }

    public function show(Candidate $candidate)
    {
        $candidate->load('applications.job');

        return view('candidates.show', compact('candidate'));
    }

    public function create()
    {
        return view('candidates.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:candidates',
            'phone' => 'nullable|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'status' => 'required|in:active,inactive,blacklisted',
        ]);

        Candidate::create($validated);

        return redirect()->route('candidates.index')->with('success', 'Candidate created successfully.');
    }

    public function edit(Candidate $candidate)
    {
        return view('candidates.edit', compact('candidate'));
    }

    public function update(Request $request, Candidate $candidate)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|unique:candidates,email,' . $candidate->id,
            'phone' => 'nullable|max:255',
            'linkedin_url' => 'nullable|url|max:255',
            'status' => 'required|in:active,inactive,blacklisted',
        ]);

        $candidate->update($validated);

        return redirect()->route('candidates.index')->with('success', 'Candidate updated successfully.');
    }

    public function destroy(Candidate $candidate)
    {
        $candidate->delete();

        return redirect()->route('candidates.index')->with('success', 'Candidate deleted successfully.');
    }
}
