<section id="galeria" class="py-24 sm:py-32 bg-white relative">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
            <div class="max-w-2xl">
                <span class="text-brand font-semibold tracking-wider uppercase text-sm">Portfolio</span>
                <h2 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl font-serif">Resultados
                    Reales</h2>
                <p class="mt-4 text-lg leading-8 text-gray-600 font-light">Una selección de nuestros trabajos más
                    recientes.</p>
            </div>
            <div class="flex-shrink-0">
                <a href="{{ $settings['instagram_url'] ?? '#' }}" target="_blank"
                    class="inline-flex items-center justify-center px-6 py-3 border border-gray-200 text-sm font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brand transition-all shadow-sm">
                    <svg class="w-5 h-5 mr-2 text-brand" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.851 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                    </svg>
                    Ver en Instagram
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @foreach($posts->take(6) as $post)
            @if($post->image_path)
            <div
                class="relative group h-96 overflow-hidden rounded-[2rem] shadow-lg cursor-pointer transform transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl">
                <img class="h-full w-full object-cover transition-transform duration-700 group-hover:scale-110"
                    src="{{ Storage::url($post->image_path) }}" alt="{{ $post->title }}">

                <!-- Overlay with clean typography -->
                <div
                    class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col justify-end p-8">
                    <span class="text-white/80 text-xs font-medium uppercase tracking-wider mb-2">
                        {{ $post->type === 'promo' ? 'Promoción' : 'Resultado' }}
                    </span>
                    <h3 class="text-white font-bold text-xl leading-tight">{{ $post->title }}</h3>
                    <p class="text-white/80 text-sm mt-2 line-clamp-2 font-light">{{ $post->content }}</p>
                </div>
            </div>
            @endif
            @endforeach

            <!-- Fallback generic images if no posts - Using high quality placeholders -->
            @if($posts->isEmpty())
            <div class="relative group h-96 overflow-hidden rounded-[2rem] shadow-lg">
                <img src="https://images.unsplash.com/photo-1632345031635-415d3cf4c70d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1974&q=80"
                    class="h-full w-full object-cover">
            </div>
            <div class="relative group h-96 overflow-hidden rounded-[2rem] shadow-lg">
                <img src="https://images.unsplash.com/photo-1522337660859-02fbefca4702?ixlib=rb-4.0.3&auto=format&fit=crop&w=2338&q=80"
                    class="h-full w-full object-cover">
            </div>
            <div class="relative group h-96 overflow-hidden rounded-[2rem] shadow-lg">
                <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
                    class="h-full w-full object-cover">
            </div>
            @endif
        </div>
    </div>
</section>