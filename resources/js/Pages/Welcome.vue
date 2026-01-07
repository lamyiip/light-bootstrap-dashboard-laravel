<template>
    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center px-4">
        <div class="max-w-4xl mx-auto text-center">
            <div class="mb-8">
                <h1 class="text-6xl font-bold text-gray-900 mb-4">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">
                        SnapRecruit
                    </span>
                </h1>
                <p class="text-2xl text-gray-600 mb-2">AI-Powered Recruitment CRM</p>
                <p class="text-lg text-gray-500">Built with VILT Stack (Vue, Inertia, Laravel, Tailwind)</p>
            </div>

            <div class="bg-white rounded-2xl shadow-xl p-8 mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">🚀 Project Status</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-left">
                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-green-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-800">Laravel 11 + Inertia.js</p>
                            <p class="text-sm text-gray-500">Modern SPA architecture configured</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-green-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-800">Vue 3 + Tailwind CSS</p>
                            <p class="text-sm text-gray-500">Composition API ready</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-green-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-800">Database Schema</p>
                            <p class="text-sm text-gray-500">Jobs, Candidates, Applications tables</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-green-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <div>
                            <p class="font-medium text-gray-800">Docker Environment</p>
                            <p class="text-sm text-gray-500">Laravel Sail with MySQL & Redis</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-blue-50 rounded-xl p-6 border border-blue-200">
                <h3 class="text-lg font-semibold text-blue-900 mb-3">📖 Next Steps</h3>
                <ul class="text-left space-y-2 text-blue-800">
                    <li class="flex items-center space-x-2">
                        <span class="w-2 h-2 bg-blue-600 rounded-full"></span>
                        <span>Run <code class="px-2 py-1 bg-blue-100 rounded text-sm font-mono">./vendor/bin/sail up -d</code> to start Docker containers</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <span class="w-2 h-2 bg-blue-600 rounded-full"></span>
                        <span>Run <code class="px-2 py-1 bg-blue-100 rounded text-sm font-mono">./vendor/bin/sail artisan migrate</code> to setup database</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <span class="w-2 h-2 bg-blue-600 rounded-full"></span>
                        <span>Run <code class="px-2 py-1 bg-blue-100 rounded text-sm font-mono">npm install && npm run dev</code> to compile assets</span>
                    </li>
                    <li class="flex items-center space-x-2">
                        <span class="w-2 h-2 bg-blue-600 rounded-full"></span>
                        <span>Check <code class="px-2 py-1 bg-blue-100 rounded text-sm font-mono">README.md</code> for complete documentation</span>
                    </li>
                </ul>
            </div>

            <div class="mt-8 text-sm text-gray-500">
                <p>Created by <span class="font-semibold">Mandy Lam</span> • Full Stack Engineer</p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head } from '@inertiajs/vue3';
</script>
