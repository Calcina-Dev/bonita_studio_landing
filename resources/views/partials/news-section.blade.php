@if(isset($news) && count($news) > 0)
<section id="novedades" class="py-24 bg-white relative overflow-hidden">
    <!-- Decorative background elements -->
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-taupe-50/50 rounded-full blur-3xl -z-10"></div>
    <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 bg-stone-50/50 rounded-full blur-3xl -z-10"></div>

    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center mb-16">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl font-serif">Novedades y Tendencias
            </h2>
            <p class="mt-4 text-lg leading-8 text-gray-600">Entérate de lo último en Bonita Studio.</p>
            <div class="mt-4 flex justify-center">
                <div class="h-1 w-20 bg-taupe-400 rounded-full"></div>
            </div>
        </div>

        <div class="relative" x-data="{ news: {{ \Illuminate\Support\Js::from($news) }} }">
            <x-shared.carousel>
                @foreach($news as $post)
                <div class="min-w-[300px] max-w-[300px] sm:min-w-[350px] sm:max-w-[350px] snap-center">
                    <article @click="$dispatch('open-news-modal', news[{{ $loop->index }}])"
                        class="flex flex-col items-start justify-between group h-full bg-white rounded-2xl p-2 transition-all duration-300 hover:shadow-lg border border-transparent hover:border-taupe-100 cursor-pointer">
                        <div class="relative w-full aspect-[4/3] overflow-hidden rounded-xl bg-gray-100 shadow-sm">
                            @if($post->image_path)
                            <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}"
                                class="absolute inset-0 h-full w-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                            @else
                            <div class="flex items-center justify-center h-full w-full bg-taupe-50 text-taupe-300">
                                @if($post->type === 'promo')
                                <span class="text-4xl">✨</span>
                                @else
                                <svg class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                                </svg>
                                @endif
                            </div>
                            @endif
                            <div
                                class="absolute inset-0 rounded-xl ring-1 ring-inset {{ $post->type === 'promo' ? 'ring-taupe-900/10' : 'ring-gray-900/10' }} mix-blend-multiply">
                            </div>
                        </div>
                        <div class="w-full p-4">
                            <div class="mt-2 flex items-center justify-between gap-x-4 text-xs">
                                <time datetime="{{ $post->published_at }}" class="text-gray-500">{{
                                    \Carbon\Carbon::parse($post->published_at)->isoFormat('D MMM, YYYY') }}</time>

                                @if($post->type === 'promo')
                                <span
                                    class="relative z-10 rounded-full bg-taupe-100 px-2.5 py-1 font-medium text-taupe-800">Promoción</span>
                                @else
                                <span
                                    class="relative z-10 rounded-full bg-stone-100 px-2.5 py-1 font-medium text-stone-600">Novedad</span>
                                @endif
                            </div>
                            <div class="group relative">
                                <h3
                                    class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-taupe-600 transition-colors font-serif line-clamp-2">
                                    <span class="absolute inset-0"></span>
                                    {{ $post->title }}
                                </h3>
                                <div class="mt-2 line-clamp-3 text-sm leading-6 text-gray-600">
                                    {!! \Illuminate\Support\Str::limit(strip_tags($post->content), 100) !!}
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
            </x-shared.carousel>
        </div>
    </div>
</section>
@endif