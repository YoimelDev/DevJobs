<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Vacante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h2 class="text-2xl font-bold text-center my-5">
                        Editar Vacante: <span class="text-indigo-600">{{ $vacant->title }}</span>
                    </h2>

                    <div class="md:flex md:justify-center pb-5">
                        <livewire:edit-vacant :vacant="$vacant" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
