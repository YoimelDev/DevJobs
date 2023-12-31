<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacancies as $vacant)
            <div
                class="p-6 text-gray-900 dark:text-gray-100 border-b border-gray-200 last:border-none md:flex md:justify-between md:items-center">
                <div class="space-y-3">
                    <a href="{{ route('vacants.show', $vacant->id) }}" class="text-xl font-bold text-indigo-500">
                        {{ $vacant->title }}
                    </a>
                    <p class="text-sm text-indigo-400 font-bold">
                        {{ $vacant->company }}
                    </p>
                    <p class="text-sm text-gray-600 dark:text-indigo-200">
                        Ultimo dia: {{ $vacant->last_day->format('d-m-Y') }}
                    </p>
                </div>

                <div class="flex gap-3 items-center mt-5 md:mt-0">
                    <a href="#"
                        class="bg-slate-800 dark:bg-indigo-800 py-2 px-4 rounded-lg text-white text-xs font-bold">
                        Candidatos
                    </a>

                    <a href="{{ route('vacants.edit', $vacant->id) }}"
                        class="bg-blue-800  py-2 px-4 rounded-lg text-white text-xs font-bold">
                        Editar
                    </a>

                    <button 
                        wire:click="$emit('showAlert', {{ $vacant->id }})" 
                        class="bg-red-600  py-2 px-4 rounded-lg text-white text-xs font-bold">
                        Eliminar
                    </button>
                </div>
            </div>
        @empty
            <div
                class="p-6 text-gray-900 dark:text-gray-100 border-b border-gray-200 last:border-none md:flex md:justify-between md:items-center">
                <div class="space-y-3">
                    <p class="text-xl font-bold text-indigo-500">
                        No tienes vacantes
                    </p>
                </div>
            </div>
        @endforelse
    </div>

    @if ($vacancies->hasPages())
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 mt-6">
            {{ $vacancies->links('') }}
        </div>
    @endif
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('showAlert', vacantId => {
            Swal.fire({
                title: '¿Estas seguro?',
                text: "No podras revertir esta accion",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3730a3',
                cancelButtonColor: '#EF4444',
                confirmButtonText: 'Si, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('show-vacancies', 'deleteVacant', vacantId);

                    Swal.fire(
                        'Eliminado!',
                        'La vacante ha sido eliminada.',
                        'success'
                    )
                }
            })
        })
    </script>
@endpush
