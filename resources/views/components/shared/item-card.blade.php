@props([
'image',
'title',
'subtitle' => null,
'price' => null,
'action' => 'Ver detalles',
'badge' => null,
'primaryColor' => '#9C8974'
])

<div {{ $attributes->merge(['class' => 'group relative flex-shrink-0 w-72 snap-start cursor-pointer transition-all
    duration-300 hover:-translate-y-2 hover:shadow-xl']) }}>
    <!-- Image Container -->
    <div
        class="aspect-[3/4] overflow-hidden rounded-2xl bg-stone-100 mb-6 relative shadow-sm group-hover:shadow-lg transition-all duration-500">
        @if($image)
        <img src="{{ $image }}" alt="{{ $title }}"
            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-[1.03]">
        @else
        <div class="h-full w-full flex items-center justify-center text-stone-300 bg-stone-100">
            <!-- Piel / Stone Placeholder -->
            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
        </div>
        @endif

        <!-- Badge dinámico -->
        @if($badge)
        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 bg-[#F3EFEA] px-4 py-1.5 rounded-full shadow-sm">
            <span class="text-[10px] uppercase tracking-[0.2em] font-medium text-stone-600 block">{{ $badge }}</span>
        </div>
        @endif
    </div>

    <!-- Content -->
    <div class="text-center px-2 space-y-3">
        <h3 class="font-serif text-2xl text-gray-900 leading-tight">{{ $title }}</h3>

        @if($subtitle)
        <p class="text-sm text-gray-500 font-light">Duración: {{ $subtitle }}</p>
        @endif

        @if($price)
        <div class="pt-1 pb-3">
            <p class="text-lg font-serif text-gray-900">
                <span class="text-sm text-gray-500 font-sans font-light mr-1">Desde</span> ${{ $price }}
            </p>
        </div>
        @endif

        <!-- WhatsApp Button (Dynamic Color) -->
        <a href="https://wa.me/?text=Hola,%20quisiera%20reservar%20{{ urlencode($title) }}" target="_blank"
            style="background-color: {{ $primaryColor }};"
            class="inline-block w-full text-white text-xs uppercase tracking-widest font-medium py-3 rounded-full hover:opacity-90 transition-all duration-300 shadow-sm">
            Reservar por WhatsApp
        </a>
    </div>
</div>