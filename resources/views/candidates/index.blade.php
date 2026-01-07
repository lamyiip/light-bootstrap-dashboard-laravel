<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Candidates') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Phone</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Culture Fit</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Applications</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse($candidates as $candidate)
                                    <tr>
                                        <td class="px-6 py-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $candidate->full_name }}</div>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $candidate->email }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $candidate->phone ?? '-' }}</td>
                                        <td class="px-6 py-4">
                                            @if($candidate->culture_fit_score)
                                                <span class="text-sm font-medium">{{ $candidate->culture_fit_score }}%</span>
                                                <span class="text-xs text-gray-500">({{ $candidate->culture_fit_badge }})</span>
                                            @else
                                                <span class="text-sm text-gray-400">Not analyzed</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $candidate->applications_count }}</td>
                                        <td class="px-6 py-4">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                                {{ $candidate->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                                                {{ ucfirst($candidate->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">No candidates found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $candidates->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
