@php
$heroBg = isset($settings['primary_color']) ? $settings['primary_color'] : '#e11d48'; // Fallback
@endphp

<section id="hero" class="scroll-mt-24 relative bg-white py-24 lg:py-32 flex items-center">

    <!-- Content container -->
    <div
        class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 w-full h-full pt-32 pb-16 lg:pt-0 relative z-10 flex items-center">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-12 items-center w-full">

            <!-- Text Content (Left) -->
            <div class="text-center lg:text-left order-2 lg:order-1 flex flex-col items-center lg:items-start">

                <h1
                    class="text-4xl md:text-5xl lg:text-6xl font-serif text-gray-900 leading-[1.15] mb-6 animate-fade-in-up tracking-tight">
                    {!! $settings['hero_title'] ?? 'Arte en <span class="font-normal text-gray-900">cada
                        detalle.</span>' !!}
                </h1>

                <p class="text-lg text-gray-600 font-normal mb-10 max-w-lg mx-auto lg:mx-0 leading-relaxed animate-fade-in-up"
                    style="animation-delay: 200ms;">
                    {{ $settings['hero_subtitle'] ?? 'Elevamos el diseño de uñas a una expresión artística. Técnicas
                    avanzadas y cuidado profundo para manos que no pasan desapercibidas.' }}
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start items-center animate-fade-in-up w-full sm:w-auto"
                    style="animation-delay: 400ms;">
                    <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}?text=Hola%20Bonita%20Studio"
                        target="_blank" style="background-color: {{ $settings['primary_color'] ?? '#9C8974' }};"
                        class="group w-full sm:w-auto px-8 py-3.5 text-white rounded-full font-medium text-sm hover:opacity-90 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.008-.57-.008-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                        </svg>
                        <span>Reservar por WhatsApp</span>
                    </a>
                    <a href="#servicios"
                        class="w-full sm:w-auto px-8 py-3.5 text-gray-900 border border-gray-300 rounded-full font-medium text-sm hover:bg-gray-50 transition-all duration-300 bg-transparent">
                        Ver servicios
                    </a>
                </div>
            </div>

            <!-- Image Content (Right) -->
            <div
                class="relative h-[500px] lg:h-[650px] w-full order-1 lg:order-2 flex items-center justify-center lg:justify-end p-4">
                <div
                    class="relative w-full max-w-sm lg:max-w-md aspect-[3/4] rounded-2xl overflow-hidden shadow-2xl bg-stone-200">
                    @if(!empty($settings['hero_image']))
                    <img src="{{ asset('storage/' . $settings['hero_image']) }}" alt="Portada Bonita Studio"
                        class="h-full w-full object-cover">
                    @else
                    <!-- Fallback Placeholder -->
                    <div
                        class="w-full h-full flex flex-col items-center justify-center bg-stone-100 text-stone-500 p-8 text-center border-2 border-dashed border-stone-200">
                        <span class="text-4xl mb-4">💅</span>
                        <p class="font-serif text-xl text-stone-700">Imagen de Portada</p>
                        <p class="text-xs uppercase tracking-widest mt-2 opacity-60">Configurar en Admin</p>
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</section>