<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <span class="text-sm text-gray-500">Welcome back, {{ auth()->user()->name }}!</span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Jobs -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-100 rounded-md p-3">
                                <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Total Jobs</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $stats['total_jobs'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Jobs -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-100 rounded-md p-3">
                                <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Active Jobs</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $stats['active_jobs'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Candidates -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-purple-100 rounded-md p-3">
                                <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Candidates</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $stats['total_candidates'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Applications -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-yellow-100 rounded-md p-3">
                                <svg class="h-6 w-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Applications</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ $stats['total_applications'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Recent Applications -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">Recent Applications</h3>
                            <a href="{{ route('applications.index') }}" class="text-sm text-blue-600 hover:text-blue-800">View all</a>
                        </div>
                        <div class="space-y-4">
                            @forelse($recent_applications as $application)
                                <div class="flex justify-between items-start border-b pb-3">
                                    <div>
                                        <p class="font-medium text-gray-900">{{ $application->candidate->full_name }}</p>
                                        <p class="text-sm text-gray-500">{{ $application->job->title }}</p>
                                    </div>
                                    <span class="px-2 py-1 text-xs rounded-full {{ $application->stage_badge_color }}">
                                        {{ $application->stage_label }}
                                    </span>
                                </div>
                            @empty
                                <p class="text-gray-500 text-sm">No applications yet.</p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Recent Jobs -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">Active Job Openings</h3>
                            <a href="{{ route('jobs.index') }}" class="text-sm text-blue-600 hover:text-blue-800">View all</a>
                        </div>
                        <div class="space-y-4">
                            @forelse($recent_jobs as $job)
                                <div class="border-b pb-3">
                                    <div class="flex justify-between items-start">
                                        <div class="flex-1">
                                            <a href="{{ route('jobs.show', $job) }}" class="font-medium text-gray-900 hover:text-blue-600">
                                                {{ $job->title }}
                                            </a>
                                            <p class="text-sm text-gray-500">{{ $job->department }} • {{ $job->location }}</p>
                                        </div>
                                        <span class="px-2 py-1 text-xs bg-blue-100 text-blue-800 rounded-full ml-2">
                                            {{ $job->applications->count() }} applicants
                                        </span>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500 text-sm">No active jobs.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
