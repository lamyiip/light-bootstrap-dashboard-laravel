<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $job->title }}
            </h2>
            <a href="{{ route('jobs.index') }}" class="text-blue-600 hover:text-blue-800">
                &larr; Back to Jobs
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Department</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $job->department ?? 'N/A' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Location</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $job->location ?? 'N/A' }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Type</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ ucfirst($job->type) }}</dd>
                        </div>
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Salary Range</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $job->salary_range }}</dd>
                        </div>
                        <div class="sm:col-span-2">
                            <dt class="text-sm font-medium text-gray-500">Description</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $job->description }}</dd>
                        </div>
                    </dl>

                    <div class="mt-8">
                        <h3 class="text-lg font-semibold mb-4">Applications ({{ $job->applications->count() }})</h3>
                        @if($job->applications->count() > 0)
                            <div class="space-y-2">
                                @foreach($job->applications as $application)
                                    <div class="flex justify-between items-center border-b pb-2">
                                        <div>
                                            <span class="font-medium">{{ $application->candidate->full_name }}</span>
                                            <span class="text-sm text-gray-500">- {{ $application->candidate->email }}</span>
                                        </div>
                                        <span class="px-2 py-1 text-xs rounded-full {{ $application->stage_badge_color }}">
                                            {{ $application->stage_label }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500">No applications yet.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
