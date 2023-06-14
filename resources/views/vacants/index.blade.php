<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session()->has('message'))
                <div class="mb-4 font-medium text-xl text-green-600 dark:text-green-400 rounded-lg bg-white dark:bg-gray-800 p-4">
                    <p>{{ session('message') }}</p>
                </div>                
            @endif

            <livewire:show-vacancies />
        </div>
    </div>
</x-app-layout>
