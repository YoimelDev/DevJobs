<div class="p-10">
    <section class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 dark:text-white mb-5">
            {{ $vacant->title }}
        </h3>

        <div class="md:grid md:grid-cols-2 bg-gray-100 dark:bg-gray-700 rounded-lg p-4 mb-5">
            <p class="font-semibold text-sm text-gray-800 dark:text-white my-3">
                Empresa: <span class="font-normal">{{ $vacant->company }}</span>
            </p>

            <p class="font-semibold text-sm text-gray-800 dark:text-white my-3">
                Ultimo dia para postularse: <span class="font-normal">{{ $vacant->last_day->toFormattedDateString() }}</span>
            </p>

            <p class="font-semibold text-sm text-gray-800 dark:text-white my-3">
                Categoria: <span class="font-normal">{{ $vacant->category->category}}</span>
            </p>

            <p class="font-semibold text-sm text-gray-800 dark:text-white my-3">
                Salario: <span class="font-normal">{{ $vacant->salary->salary }}</span>
            </p>
        </div>

        <div class="md:grid md:grid-cols-6 gap-5">       
            <img class="md:col-span-2" src="{{ asset('storage/vacants/' . $vacant->image) }}" alt="Imagen Vacante">

            <section class="md:col-span-4 bg-gray-100 dark:bg-gray-700 rounded-lg p-4">
                <h3 class="font-bold text-2xl text-gray-800 dark:text-white mb-5">
                    Descripcion del puesto
                </h3>

                <div class="text-gray-700 dark:text-white">
                    <p>{{ $vacant->job_description  }}</p>
                </div>
            </section>
        </div>

      @guest
        <div class="mt-5 bg-gray-100 dark:bg-gray-700 rounded-lg border border-dashed p-5 text-center">
            <p class="dark:text-white">
                Deseas aplicar a esta vacante? 
                <a href="{{ route('register') }}">
                    <span class="font-semibold text-indigo-500">Postulate</span>
                </a>
            </p>
        </div>
      @endguest
    </section>

    @cannot('create', App\Models\Vacant::class)
        <livewire:apply-vacant />        
    @endcannot
</div>
