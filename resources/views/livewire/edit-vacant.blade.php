<form class="md:w-1/2 space-y-5" wire:submit.prevent="editVacant">
    <!-- Vacant Title -->
    <div>
        <x-input-label for="title" :value="__('Titulo Vacante')" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" wire:model="title" :value="old('title')"
            placeholder="Titulo Vacante" />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    <!-- Vacant Salary -->
    <div>
        <x-input-label for="salary" :value="__('Salario Mensual')" />

        <select
            class="border-gray-300 w-full mt-1 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
            wire:model="salary" id="salary">

            <option value="" selected>-- Selecciona --</option>
            @foreach ($salaries as $salary)
                <option value="{{ $salary->id }}">{{ $salary->salary }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('salary')" class="mt-2" />
    </div>

    <!-- Categories -->
    <div>
        <x-input-label for="category" :value="__('Categorias')" />

        <select
            class="border-gray-300 w-full mt-1 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
            wire:model="category" id="category">

            <option value="" selected>-- Selecciona --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('category')" class="mt-2" />
    </div>

    <!-- Company -->
    <div>
        <x-input-label for="company" :value="__('Empresa')" />
        <x-text-input id="company" class="block mt-1 w-full" type="text" wire:model="company" :value="old('company')"
            placeholder="Empresa: ej. DevJobs" />
        <x-input-error :messages="$errors->get('company')" class="mt-2" />
    </div>

    <!-- Last Day  -->
    <div>
        <x-input-label for="last_day" :value="__('Ultimo dia para postularse')" />
        <x-text-input id="last_day" class="block mt-1 w-full" type="date" wire:model="last_day"
            :value="old('last_day')" />
        <x-input-error :messages="$errors->get('last_day')" class="mt-2" />
    </div>

    <!-- Job description  -->
    <div>
        <x-input-label for="job_description" :value="__('Descripcion Puesto')" />
        <textarea id="job_description" wire:model="job_description"
            class="border-gray-300 w-full mt-1 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
            placeholder="Descripcion Puesto"></textarea>
        <x-input-error :messages="$errors->get('job_description')" class="mt-2" />
    </div>

    <!-- Image  -->
    <div>
        <x-input-label for="newImage" :value="__('Imagen')" />
        <x-text-input id="newImage" class="block mt-1 w-full" type="file" wire:model="newImage" accept="image/*" />

        @if ($newImage)
            <img class="my-5 w-96" src="{{ $newImage->temporaryUrl() }}" alt="Nueva Imagen Vacante">
        @else 
            <img class="my-5 w-96" src="{{ asset('storage/vacants/' . $image) }}" alt="Imagen Vacante">
        @endif

        <x-input-error :messages="$errors->get('newImage')" class="mt-2" />
    </div>

    <!-- Submit Button -->
    <div>
        <x-primary-button>
            {{ __('Guardar Cambios') }}
        </x-primary-button>
    </div>
</form>
