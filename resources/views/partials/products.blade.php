<section id="productos" class="scroll-mt-22 py-36 lg:py-40 bg-white relative z-30 overflow-hidden">
    <!-- Decorative refined background element -->
    <div
        class="absolute top-0 left-1/2 -translate-x-1/2 w-[120%] h-64 bg-gradient-to-b from-[#F9F7F5] to-transparent opacity-60 -z-10">
    </div>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col items-center mb-16 text-center">
            <span class="text-[#A68E76] font-medium tracking-[0.25em] uppercase text-xs mb-4 block">Cuidado
                Personal</span>
            <h2 class="text-5xl md:text-6xl font-serif text-gray-900 tracking-tight leading-none mb-6">Productos
                Exclusivos</h2>
            <!-- Decorative line -->
            <div class="w-24 h-px bg-gray-300"></div>
        </div>


        <x-shared.carousel>
            @foreach($products as $product)
            <x-shared.item-card :image="$product->image_path ? Storage::url($product->image_path) : null"
                :title="$product->name" :subtitle="null" badge="Producto"
                :primary-color="$settings['primary_color'] ?? '#9C8974'"
                :price="'$' . number_format($product->price, 0, ',', '.')" action="Ver detalles" @click="$dispatch('open-modal-details', { 
                        title: '{{ addslashes($product->name) }}',
                        image: '{{ $product->image_path ? Storage::url($product->image_path) : '' }}',
                        price: '${{ number_format($product->price, 0, ',', '.') }}',
                        description: '{{ addslashes($product->description) }}',
                        type: 'product',
                        category: 'Cuidado & Mantenimiento'
                    })" />
            @endforeach
        </x-shared.carousel>
    </div>
</section>