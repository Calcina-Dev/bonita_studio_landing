<section id="servicios" class="scroll-mt-22 py-36 lg:py-40 bg-[#F5F3F0] relative z-40 overflow-hidden">
    <!-- Decorative refined background element -->
    <div
        class="absolute top-0 left-1/2 -translate-x-1/2 w-[120%] h-64 bg-gradient-to-b from-[#F9F7F5] to-transparent opacity-60 -z-10">
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="flex flex-col items-center mb-16 text-center">
            <span class="text-[#A68E76] font-medium tracking-[0.25em] uppercase text-xs mb-4 block">Lo más
                solicitado</span>
            <h2 class="text-5xl md:text-6xl font-serif text-gray-900 tracking-tight leading-none mb-6">Nuestros
                Servicios</h2>
            <!-- Decorative line -->
            <div class="w-24 h-px bg-gray-300"></div>
        </div>


        <x-shared.carousel>
            @foreach($services as $service)
            <x-shared.item-card :image="$service->cover_image ? Storage::url($service->cover_image) : null"
                :title="$service->name" :subtitle="$service->duration ?? '' " badge="Servicio"
                :primary-color="$settings['primary_color'] ?? '#9C8974'"
                :price="'$' . number_format($service->price, 0, ',', '.')" action="Ver detalles" @click="$dispatch('open-modal-details', { 
                        title: '{{ addslashes($service->name) }}',
                        image: '{{ $service->cover_image ? Storage::url($service->cover_image) : '' }}',
                        price: '${{ number_format($service->price, 0, ',', '.') }}',
                        description: '{{ addslashes($service->description) }}',
                        duration: '{{ $service->duration }}',
                        type: 'service',
                        category: 'Servicio de Uñas'
                    })" />
            @endforeach
        </x-shared.carousel>
    </div>
</section>