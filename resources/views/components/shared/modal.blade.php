@props(['name', 'settings' => []])

<div x-data="{ show: false, item: {} }" x-on:open-modal-{{ $name
    }}.window="show = true; item = $event.detail; document.body.classList.add('overflow-hidden');"
    x-on:close-modal.window="show = false; document.body.classList.remove('overflow-hidden');"
    x-on:keydown.escape.window="show = false; document.body.classList.remove('overflow-hidden');" x-show="show"
    style="display: none;" class="relative z-[9999]" aria-labelledby="modal-title" role="dialog" aria-modal="true"
    x-cloak>
    <!-- Background backdrop -->
    <div x-show="show" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-stone-900/40 backdrop-blur-sm transition-opacity"
        @click="show = false; document.body.classList.remove('overflow-hidden');"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center">
            <!-- Modal panel -->
            <div x-show="show" x-transition:enter="transform transition ease-in-out duration-500 sm:duration-300"
                x-transition:enter-start="translate-y-4 opacity-0 scale-95"
                x-transition:enter-end="translate-y-0 opacity-100 scale-100"
                x-transition:leave="transform transition ease-in-out duration-300 sm:duration-200"
                x-transition:leave-start="translate-y-0 opacity-100 scale-100"
                x-transition:leave-end="translate-y-4 opacity-0 scale-95"
                class="relative transform overflow-hidden rounded-2xl bg-[#FDFBF7] text-left shadow-2xl transition-all sm:w-full sm:max-w-4xl border border-[#EBE5DE]">

                <!-- Header: Centered Logo & Close Button -->
                <div class="relative flex items-center justify-center pt-8 pb-4 border-b border-[#EBE5DE]/50">
                    <div class="text-center">
                        <h2 class="font-serif text-3xl text-gray-900 tracking-tight leading-none">Bonita</h2>
                        <span class="text-[10px] uppercase tracking-[0.25em] text-gray-500 block mt-1">NAIL
                            STUDIO</span>
                    </div>

                    <!-- Close Button -->
                    <button @click="show = false; document.body.classList.remove('overflow-hidden');"
                        class="absolute right-6 top-6 p-2 text-gray-400 hover:text-gray-600 bg-transparent rounded-full transition-colors">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.0" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="flex flex-col md:flex-row">
                    <!-- Left Column: Image, Price, CTA -->
                    <div class="md:w-[45%] p-8 flex flex-col items-center border-r border-[#EBE5DE]/50 bg-white/50">
                        <!-- Image Container -->
                        <div class="w-full aspect-square relative rounded-xl overflow-hidden shadow-sm mb-6">
                            <img :src="item.image" :alt="item.title"
                                class="absolute inset-0 h-full w-full object-cover">
                        </div>

                        <!-- Price -->
                        <div class="text-center mb-6">
                            <p class="text-gray-500 font-light text-lg">Desde <span
                                    class="font-medium text-gray-900 text-xl"
                                    x-text="(item.price || '').replace('$', '')"></span></p>
                        </div>

                        <!-- WhatsApp CTA -->
                        <a :href="'https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}?text=Hola,%20me%20interesa%20' + encodeURIComponent(item.title)"
                            target="_blank" style="background-color: {{ $settings['primary_color'] ?? '#9C8974' }};"
                            class="w-full flex items-center justify-center gap-2 text-white py-3.5 px-6 rounded-full transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 hover:opacity-90 group">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.008-.57-.008-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                            </svg>
                            <span class="font-medium text-sm">Reservar por WhatsApp</span>
                        </a>
                    </div>

                    <!-- Right Column: Details & Content -->
                    <div class="md:w-[55%] p-8 pt-6 flex flex-col justify-center">
                        <h3 x-text="item.title" class="text-4xl font-serif text-gray-900 mb-6 leading-tight"></h3>

                        <div class="prose prose-stone text-gray-600 mb-8 font-light leading-relaxed">
                            <p x-text="item.description"></p>
                        </div>

                        <!-- Static Features List (Based on Mockup/Common needs) -->
                        <div class="space-y-3 mb-10">
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 mt-0.5 shrink-0" fill="none"
                                    style="color: {{ $settings['primary_color'] ?? '#9C8974' }};" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-600 font-light text-sm">Duración: <span
                                        x-text="item.duration || 'Consultar'"></span></span>
                            </div>
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-[#9C8974] mt-0.5 shrink-0" fill="none" class=""
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-600 font-light text-sm">Amplia gama de colores y diseños</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-[#9C8974] mt-0.5 shrink-0" fill="none" class=""
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span class="text-gray-600 font-light text-sm">Brillo y resistencia excepcionales</span>
                            </div>
                        </div>

                        <!-- Footer Contact Text -->
                        <div class="mt-auto pt-6 border-t border-[#EBE5DE]/50">
                            <p class="text-xs text-gray-400 font-light text-center md:text-left">
                                ¿Prefieres llamarnos? Contáctanos al {{ $settings['phone'] ?? '+54 9 11 1234-5678' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>