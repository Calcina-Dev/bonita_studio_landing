<section id="contacto" class="scroll-mt-24 py-32 lg:py-36 bg-[#F5F3F0]">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <!-- White Container -->
        <div class="bg-white rounded-[32px] shadow-[0_4px_20px_rgb(0,0,0,0.04)] overflow-hidden p-8 lg:p-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

                <!-- Left Column: Contact Information -->
                <div class="flex flex-col">
                    <!-- Section Title -->
                    <span
                        class="block text-[#A68E76] font-medium tracking-[0.35em] uppercase text-[10px] mb-6">Contacto</span>

                    <!-- Main Title -->
                    <h2 class="text-5xl md:text-6xl font-serif text-gray-900 mb-8 leading-[1.1]">
                        Visítanos
                    </h2>

                    <!-- Contact Details -->
                    <div class="space-y-6 mb-10">
                        <!-- Address -->
                        <div class="flex items-start gap-4">
                            <div
                                class="flex-shrink-0 w-12 h-12 rounded-full bg-[#F5F3F0] flex items-center justify-center">
                                <svg class="w-6 h-6 text-[#A68E76]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Dirección</h3>
                                <p class="text-gray-600 font-light">{{ $settings['address'] ?? 'Dirección no
                                    configurada' }}</p>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-start gap-4">
                            <div
                                class="flex-shrink-0 w-12 h-12 rounded-full bg-[#F5F3F0] flex items-center justify-center">
                                <svg class="w-6 h-6 text-[#A68E76]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Teléfono</h3>
                                <p class="text-gray-600 font-light">{{ $settings['phone'] ?? '+54 9 11 1234-5678' }}</p>
                            </div>
                        </div>

                        <!-- Hours -->
                        <div class="flex items-start gap-4">
                            <div
                                class="flex-shrink-0 w-12 h-12 rounded-full bg-[#F5F3F0] flex items-center justify-center">
                                <svg class="w-6 h-6 text-[#A68E76]" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Horarios</h3>
                                <p class="text-gray-600 font-light">Lunes a Sábado: 9:00 - 20:00</p>
                            </div>
                        </div>
                    </div>

                    <!-- WhatsApp Button -->
                    <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}?text=Hola%20Bonita%20Studio"
                        target="_blank" style="background-color: {{ $settings['primary_color'] ?? '#9C8974' }};"
                        class="inline-flex items-center justify-center gap-2 text-white px-6 py-3.5 rounded-full transition-all duration-300 shadow-sm hover:shadow-md hover:opacity-90 font-medium text-[15px] w-full sm:w-auto">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.008-.57-.008-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                        </svg>
                        <span>Escribinos por WhatsApp</span>
                    </a>
                </div>

                <!-- Right Column: Map -->
                <div class="relative">
                    @if(isset($settings['map_embed_url']) && $settings['map_embed_url'])
                    <div class="aspect-[4/3] rounded-[24px] overflow-hidden bg-gray-100 shadow-md">
                        <iframe src="{{ $settings['map_embed_url'] }}" width="100%" height="100%" style="border:0;"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    @else
                    <!-- Fallback -->
                    <div
                        class="aspect-[4/3] rounded-[24px] overflow-hidden bg-gray-100 flex items-center justify-center text-gray-400 shadow-md">
                        <div class="text-center">
                            <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <p class="text-sm">Mapa no configurado</p>
                        </div>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</section>