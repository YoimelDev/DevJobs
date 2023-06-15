<div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-5 flex flex-col justify-center items-center">
    <h1 class="dark:text-white text-left text-2xl font-bold">Postularme a esta vacante</h1>

    <form class="w-96 mt-5">
        <div>
            <x-input-label for="cv" :value="__('Curriculum')" />
            <x-text-input id="cv" class="block mt-1 w-full" type="file" wire:model="cv" :value="old('cv')"
                placeholder="Empresa: ej. DevJobs" accept=".pdf" />
            <x-input-error :messages="$errors->get('cv')" class="mt-2" />
        </div>
    </form>
</div>
