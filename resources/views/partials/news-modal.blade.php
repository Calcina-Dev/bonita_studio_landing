@push('modals')
<div x-data="{ 
        open: false, 
        post: {},
        init() {
            window.addEventListener('open-news-modal', event => {
                this.post = event.detail;
                this.open = true;
            });
            $watch('open', value => {
                if (value) {
                    document.body.classList.add('overflow-hidden');
                } else {
                    document.body.classList.remove('overflow-hidden');
                }
            });
        }
    }" x-show="open" style="display: none;" class="relative z-[9999]" aria-labelledby="modal-title" role="dialog"
    aria_modal="true">

    <!-- Backdrop -->
    <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-black/40 backdrop-blur-sm transition-opacity"></div>

    <!-- Modal Container -->
    <div class="fixed inset-0 z-[9999] overflow-y-auto select-none">
        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0 w-full">

            <div x-show="open" @click.away="open = false" x-transition:enter="ease-out duration-500"
                x-transition:enter-start="opacity-0 translate-y-8 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-300"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-8 sm:translate-y-0 sm:scale-95" style="max-width: 600px;"
                class="relative transform overflow-hidden rounded-2xl bg-[#FDFBF7] text-left shadow-xl transition-all sm:my-8 w-full border border-white/60 mx-auto">

                <!-- Close Button -->
                <div class="absolute right-5 top-5 z-20">
                    <button type="button" @click="open = false"
                        class="rounded-full bg-white/80 backdrop-blur p-2 text-[#9C8974] hover:bg-white hover:text-[#7A6550] focus:outline-none transition-colors border border-black/5 shadow-sm">
                        <span class="sr-only">Cerrar</span>
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Image Section -->
                <div class="relative w-full h-64 sm:h-72 bg-gray-100">
                    <template x-if="post.image_path">
                        <img :src="'/storage/' + post.image_path" :alt="post.title" class="w-full h-full object-cover">
                    </template>
                    <template x-if="!post.image_path">
                        <div class="w-full h-full flex items-center justify-center bg-taupe-50 text-taupe-200">
                            <svg class="w-20 h-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </template>
                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-[#FDFBF7] to-transparent opacity-80"></div>
                </div>

                <div class="relative px-8 sm:px-10 pb-10 -mt-12">
                    <!-- Category Badge -->
                    <div class="flex justify-center mb-6">
                        <span x-text="post.type === 'promo' ? 'PROMOCIÓN' : 'NOVEDAD'"
                            class="px-4 py-1.5 rounded-full bg-white shadow-sm border border-stone-100 text-[11px] font-bold tracking-[0.2em] text-[#9C8974] uppercase">
                        </span>
                    </div>

                    <!-- Header -->
                    <div class="text-center mb-8">
                        <h3 class="text-3xl sm:text-4xl font-serif text-[#4A4238] leading-tight mb-4"
                            x-text="post.title"></h3>
                        <div class="flex items-center justify-center gap-2 text-sm text-stone-500 font-medium">
                            <template x-if="post.published_at">
                                <span>{{ \Carbon\Carbon::now()->format('d M, Y') }}</span>
                                <!-- Fallback format logic handled in JS/Alpine usage often simpler to just show visual placeholder or use JS date format if needed, but for simplicity we rely on what passed or formatted if possible. Using JS Date would be better here -->
                                <span
                                    x-text="new Date(post.published_at).toLocaleDateString('es-ES', { day: 'numeric', month: 'long', year: 'numeric' })"></span>
                            </template>
                        </div>
                    </div>

                    <!-- Content -->
                    <div
                        class="prose prose-stone prose-p:text-gray-500 prose-p:font-light prose-headings:font-serif prose-headings:text-[#4A4238] mx-auto">
                        <div x-html="post.content"></div>
                    </div>

                    <!-- Footer / Buttons -->
                    <div class="mt-10 pt-8 border-t border-stone-100 space-y-4">
                        <!-- Main CTA for Promos -->
                        <template x-if="post.type === 'promo'">
                            <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}?text=Hola,%20me%20interesa%20esta%20promo"
                                target="_blank" style="background-color: #9C8974;"
                                class="w-full flex items-center justify-center gap-2 rounded-full px-6 py-4 text-sm font-bold text-white shadow-lg shadow-[#9C8974]/20 hover:opacity-90 hover:shadow-xl hover:shadow-[#9C8974]/30 transition-all transform hover:-translate-y-0.5 duration-300">
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.008-.57-.008-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                </svg>
                                <span>Reservar Promo</span>
                            </a>
                        </template>

                        <!-- Close Button -->
                        <button @click="open = false"
                            class="w-full text-center text-xs text-stone-400 hover:text-stone-600 font-bold transition-colors uppercase tracking-wider py-2">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endpush