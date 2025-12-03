<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if(auth()->user()->role === 'sales')
        {{-- Sales Dashboard --}}
        <livewire:sales-dashboard />
    @else
        {{-- Default Dashboard for other roles --}}
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h3 class="text-lg font-semibold mb-4">Welcome, {{ auth()->user()->name }}!</h3>
                        <p>You're logged in as: <span class="font-bold">{{ ucfirst(auth()->user()->role) }}</span></p>
                        <p class="mt-2">Status:
                            <span class="font-bold {{ auth()->user()->is_active ? 'text-green-600' : 'text-red-600' }}">
                                {{ auth()->user()->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
