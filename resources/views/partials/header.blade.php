<header x-data="{ 
        mobileMenuOpen: false, 
        scrolled: false,
        activeSection: 'hero'
    }" @scroll.window="
        scrolled = (window.pageYOffset > 50);
        
        // Detect active section
        const sections = ['hero', 'servicios', 'productos', 'nosotros', 'contacto'];
        const scrollPos = window.pageYOffset + 200;
        
        for (const section of sections) {
            const element = document.getElementById(section);
            if (element) {
                const offsetTop = element.offsetTop;
                const offsetBottom = offsetTop + element.offsetHeight;
                if (scrollPos >= offsetTop && scrollPos < offsetBottom) {
                    activeSection = section;
                    break;
                }
            }
        }
    "
    :class="{ 'bg-white/95 backdrop-blur-lg shadow-md border-gray-100 py-2': scrolled, 'bg-white/90 backdrop-blur-md shadow-sm border-gray-200 py-4': !scrolled }"
    class="sticky top-0 w-full z-50 transition-all duration-300 ease-in-out border-b">

    <nav class="mx-auto flex w-full items-center justify-between px-6 lg:px-12" aria-label="Global">

        <!-- Logo (Left) -->
        <div class="flex-shrink-0 transition-transform duration-300" :class="{ 'scale-90': scrolled }">
            <a href="#" class="-m-1.5 p-1.5 flex flex-col leading-none group">
                <span
                    class="font-serif text-2xl text-gray-900 group-hover:text-taupe-500 transition-colors tracking-tight">Bonita</span>
                <span
                    class="text-[10px] uppercase tracking-[0.25em] text-gray-500 group-hover:text-taupe-900 transition-colors pl-0.5">
                    STUDIO</span>
            </a>
        </div>

        <!-- Desktop Navigation & CTA (Right) - Centered/Right aligned -->
        <div class="hidden lg:flex lg:flex-1 lg:justify-end lg:gap-x-12 items-center">

            <div class="flex gap-x-16 items-center">
                <a href="#hero" :class="activeSection === 'hero' ? 'text-taupe-900' : 'text-gray-700'"
                    class="relative text-[14px] font-normal hover:text-taupe-900 transition-all hover:-translate-y-0.5 whitespace-nowrap pb-3">
                    Inicio
                    <span x-show="activeSection === 'hero'" class="absolute bottom-0 left-0 w-full h-0.5 bg-taupe-500"
                        style="transition: opacity 0.3s ease;" x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"></span>
                </a>
                <a href="#servicios"
                    :class="activeSection === 'servicios' ? 'text-taupe-900 border-taupe-900' : 'text-gray-700 border-transparent'"
                    class="relative text-[14px] font-normal hover:text-taupe-900 transition-all hover:-translate-y-0.5 whitespace-nowrap pb-1 border-b-2">
                    Servicios
                </a>
                <a href="#productos"
                    :class="activeSection === 'productos' ? 'text-taupe-900 border-taupe-900' : 'text-gray-700 border-transparent'"
                    class="relative text-[14px] font-normal hover:text-taupe-900 transition-all hover:-translate-y-0.5 whitespace-nowrap pb-1 border-b-2">
                    Productos
                </a>
                <a href="#nosotros"
                    :class="activeSection === 'nosotros' ? 'text-taupe-900 border-taupe-900' : 'text-gray-700 border-transparent'"
                    class="relative text-[14px] font-normal hover:text-taupe-900 transition-all hover:-translate-y-0.5 whitespace-nowrap pb-1 border-b-2">
                    Nosotros
                </a>
                <a href="#contacto"
                    :class="activeSection === 'contacto' ? 'text-taupe-900 border-taupe-900' : 'text-gray-700 border-transparent'"
                    class="relative text-[14px] font-normal hover:text-taupe-900 transition-all hover:-translate-y-0.5 whitespace-nowrap pb-1 border-b-2">
                    Contacto
                </a>
            </div>

            <!-- CTA Button -->
            <div class="pl-0 lg:pl-4">
                <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}?text=Hola%20Bonita%20Studio"
                    target="_blank" style="background-color: {{ $settings['primary_color'] ?? '#9C8974' }};"
                    class="group flex items-center gap-2 rounded-full px-6 py-2.5 text-sm font-medium text-white hover:opacity-90 transition-all duration-300 shadow-sm hover:shadow-md transform hover:-translate-y-0.5">
                    <svg class="w-4 h-4 text-[#25D366] fill-current shrink-0" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.008-.57-.008-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                    </svg>
                    <span>Reservar</span>
                </a>
            </div>
        </div>

        <!-- Mobile Toggle (Right) -->
        <div class="flex lg:hidden">
            <button @click="mobileMenuOpen = true" type="button"
                class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-900 hover:text-taupe-900 transition-colors">
                <span class="sr-only">Abrir menú</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
    </nav>

    <!-- Mobile menu -->
    <div x-show="mobileMenuOpen" class="relative z-[100]" aria-modal="true" x-cloak>

        <!-- Backdrop -->
        <div x-show="mobileMenuOpen" x-transition:enter="ease-in-out duration-500" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-500"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm transition-opacity" @click="mobileMenuOpen = false">
        </div>

        <div class="fixed inset-0 overflow-hidden z-[101]">
            <div class="absolute inset-0 overflow-hidden">
                <div class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10 h-screen">

                    <!-- Slide-over panel -->
                    <div x-show="mobileMenuOpen"
                        x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                        x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                        x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                        x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                        class="pointer-events-auto w-screen max-w-md h-screen min-h-screen">

                        <div class="flex  flex-col overflow-y-scroll bg-white py-6 shadow-xl"
                            style="background-color: #ffffff !important; opacity: 1 !important; height: 100vh;">
                            <div class="px-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <a href="#" class="-m-2 p-1.5 flex flex-col leading-none">
                                        <span class="font-serif text-2xl text-gray-900">Bonita</span>
                                        <span class="text-[10px] uppercase tracking-[0.25em] text-gray-500">
                                            STUDIO</span>
                                    </a>
                                    <div class="ml-3 flex h-7 items-center">
                                        <button type="button"
                                            class="relative rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-taupe-500 focus:ring-offset-2"
                                            @click="mobileMenuOpen = false">
                                            <span class="absolute -inset-2.5"></span>
                                            <span class="sr-only">Cerrar menú</span>
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="relative mt-6 flex-1 px-4 sm:px-6">
                                <!-- Navigation Links -->
                                <div class="flex flex-col gap-y-6">
                                    <a href="#hero" @click="mobileMenuOpen = false"
                                        class="block rounded-md px-3 py-2 text-lg font-medium text-gray-900 hover:bg-gray-50 hover:text-taupe-900">Inicio</a>
                                    <a href="#servicios" @click="mobileMenuOpen = false"
                                        class="block rounded-md px-3 py-2 text-lg font-medium text-gray-900 hover:bg-gray-50 hover:text-taupe-900">Servicios</a>
                                    <a href="#productos" @click="mobileMenuOpen = false"
                                        class="block rounded-md px-3 py-2 text-lg font-medium text-gray-900 hover:bg-gray-50 hover:text-taupe-900">Productos</a>
                                    <a href="#nosotros" @click="mobileMenuOpen = false"
                                        class="block rounded-md px-3 py-2 text-lg font-medium text-gray-900 hover:bg-gray-50 hover:text-taupe-900">Nosotros</a>
                                    <a href="#contacto" @click="mobileMenuOpen = false"
                                        class="block rounded-md px-3 py-2 text-lg font-medium text-gray-900 hover:bg-gray-50 hover:text-taupe-900">Contacto</a>

                                    <div class="mt-8 border-t border-gray-100 pt-8">
                                        <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}?text=Hola%20Bonita%20Studio"
                                            target="_blank"
                                            style="background-color: {{ $settings['primary_color'] ?? '#9C8974' }};"
                                            class="flex w-full items-center justify-center gap-2 rounded-full px-3 py-4 text-base font-bold text-white hover:opacity-90 transition-colors shadow-md transform active:scale-95 duration-200">
                                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.008-.57-.008-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                                            </svg>
                                            <span>Reservar Cita</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>