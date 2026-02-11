<section id="nosotros" class="scroll-mt-22 py-36 lg:py-40 bg-[#F5F3F0]">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <!-- White Container with subtle shadow -->
        <div class="bg-white rounded-[32px] shadow-[0_4px_20px_rgb(0,0,0,0.04)] overflow-hidden p-8 lg:p-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center">

                <!-- Left Column: Image with rounded corners and padding -->
                <div class="relative">
                    <div class="aspect-[1/1] max-h-[500px] rounded-[24px] overflow-hidden bg-gray-100">
                        @if(isset($settings['about_image']) && $settings['about_image'])
                        <img src="{{ Storage::url($settings['about_image']) }}" alt="Bonita Studio"
                            class="h-full w-full object-cover">
                        @else
                        <div class="h-full w-full flex items-center justify-center text-gray-300">
                            <span class="text-lg uppercase tracking-widest">Imagen</span>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Right Column: Content -->
                <div class="flex flex-col justify-start pt-4">
                    <!-- Subtitle -->
                    <span
                        class="block text-[#A68E76] font-medium tracking-[0.35em] uppercase text-[10px] mb-6">Nosotros</span>

                    <!-- Main Title -->
                    <h2 class="text-5xl md:text-6xl font-serif text-gray-900 mb-6 leading-[1.1]">
                        {{ $settings['about_title'] ?? 'Bonita Studio' }}
                    </h2>

                    <!-- Secondary Subtitle -->
                    <p class="text-xl text-gray-700 mb-8 font-light leading-relaxed">
                        Un espacio donde el cuidado se siente y el diseño se nota.
                    </p>

                    <!-- Description -->
                    <p class="text-gray-600 mb-10 font-light leading-relaxed text-[15px]">
                        {{ $settings['about_description'] ?? 'Trabajamos con técnicas modernas, productos profesionales
                        y un enfoque obsesivo por los detalles. Queremos que salgas con uñas lindas y una experiencia
                        tranquila.' }}
                    </p>

                    <!-- Features List -->
                    <div class="space-y-4 mb-10">
                        <div class="flex items-start gap-4">
                            <span class="text-xl flex-shrink-0 mt-0.5">✨</span>
                            <span class="text-gray-700 font-light text-[15px] leading-relaxed">Técnicas avanzadas
                                (kapping, soft gel, nail art)</span>
                        </div>
                        <div class="flex items-start gap-4">
                            <span class="text-xl flex-shrink-0 mt-0.5">🔧</span>
                            <span class="text-gray-700 font-light text-[15px] leading-relaxed">Higiene y herramientas
                                esterilizadas</span>
                        </div>
                        <div class="flex items-start gap-4">
                            <span class="text-xl flex-shrink-0 mt-0.5">🎨</span>
                            <span class="text-gray-700 font-light text-[15px] leading-relaxed">Diseños personalizados
                                según tu estilo</span>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <!-- Primary Button (Taupe/Brown) -->
                        <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}?text=Hola%20Bonita%20Studio"
                            target="_blank" style="background-color: {{ $settings['primary_color'] ?? '#9C8974' }};"
                            class="inline-flex items-center justify-center gap-2 text-white px-6 py-3.5 rounded-full transition-all duration-300 shadow-sm hover:shadow-md hover:opacity-90 font-medium text-[15px]">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.008-.57-.008-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                            </svg>
                            <span>Reservar por WhatsApp</span>
                        </a>

                        <!-- Secondary Button (Outline) -->
                        <a href="#galeria"
                            class="inline-flex items-center justify-center gap-2 bg-transparent hover:bg-gray-50 text-gray-900 px-6 py-3.5 rounded-full border border-gray-300 transition-all duration-300 font-medium text-[15px]">
                            <span>Ver portafolio</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>