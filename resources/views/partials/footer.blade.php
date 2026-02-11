<footer class="bg-gray-900" aria-labelledby="footer-heading">
    <h2 id="footer-heading" class="sr-only">Footer</h2>
    <div class="mx-auto max-w-7xl px-6 pb-8 pt-16 sm:pt-24 lg:px-8 lg:pt-32">
        <div class="xl:grid xl:grid-cols-3 xl:gap-8">
            <div class="space-y-8">
                <span class="text-2xl font-bold text-white">Bonita<span class="text-brand">Studio</span></span>
                <p class="text-sm leading-6 text-gray-300">
                    Realzando tu belleza natural con servicios profesionales de manicura, pedicura y estética.
                </p>
                <div class="flex space-x-6">
                    @if(isset($settings['instagram_url']))
                    <a href="{{ $settings['instagram_url'] }}" class="text-gray-400 hover:text-white">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772 4.902 4.902 0 011.772-1.153c.636-.247 1.363-.416 2.427-.465C9.673 2.013 10.03 2 12.488 2h.128zm-2.7 1.993c-2.838 0-3.35.016-4.322.064-.967.048-1.492.213-1.841.353-.462.18-.792.39-1.139.736-.346.347-.556.677-.736 1.139-.14.35-.305.875-.353 1.841-.048.972-.064 1.484-.064 4.322 0 2.838.016 3.35.064 4.322.048.967.213 1.492.353 1.841.18.462.39.792.736 1.139.347.346.677.556 1.139.736.35.14.875.305 1.841.353.972.048 1.484.064 4.322.064 2.838 0 3.35-.016 4.322-.064.967-.048 1.492-.213 1.841-.353.462-.18.792-.39 1.139-.736.347-.346.556-.677.736-1.139.14-.35.305-.875.353-1.841.048-.972.064-1.484.064-4.322 0-2.838-.016-3.35-.064-4.322-.048-.967-.213-1.492-.353-1.841-.18-.462-.39-.792-.736-1.139-.346-.347-.677-.556-1.139-.736-.35-.14-.875-.305-1.841-.353-.972-.048-1.484-.064-4.322-.064zM12.46 6.307c-3.141 0-5.694 2.553-5.694 5.694 0 3.14 2.553 5.694 5.694 5.694 3.14 0 5.694-2.553 5.694-5.694 0-3.14-2.553-5.694-5.694-5.694zm0 2c2.035 0 3.694 1.659 3.694 3.694 0 2.035-1.659 3.694-3.694 3.694-2.035 0-3.694-1.659-3.694-3.694 0-2.035 1.659-3.694 3.694-3.694zM18.89 4.07a1.33 1.33 0 11-1.33 1.33 1.33 1.33 0 011.33-1.33z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    @endif
                    <!-- Add more social icons as needed -->
                    @if(isset($settings['facebook_url']))
                    <a href="{{ $settings['facebook_url'] }}" class="text-gray-400 hover:text-white" target="_blank">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    @endif

                    @if(isset($settings['tiktok_url']))
                    <a href="{{ $settings['tiktok_url'] }}" class="text-gray-400 hover:text-white" target="_blank">
                        <span class="sr-only">TikTok</span>
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93v6.14c0 3.48-2.81 6.31-6.29 6.31-3.47 0-6.29-2.83-6.29-6.31 0-3.48 2.82-6.31 6.29-6.31 1.72 0 3.27.7 4.39 1.83l2.83-2.83c-1.8-1.82-4.29-2.93-7.22-2.93-5.61 0-10.15 4.58-10.15 10.23 0 5.66 4.54 10.23 10.15 10.23 5.61 0 10.15-4.57 10.15-10.23V7.93c.89.04 1.74.2 2.53.53V4.28c-.80-.27-1.66-.46-2.58-.51-1.3-.08-2.53.2-3.69.76.01-1.51.02-3.04.03-4.52z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    @endif
                </div>
            </div>
            <div class="mt-16 grid grid-cols-2 gap-8 xl:col-span-2 xl:mt-0">
                <div class="md:grid md:grid-cols-2 md:gap-8">
                    <div>
                        <h3 class="text-sm font-semibold leading-6 text-white">Navegación</h3>
                        <ul role="list" class="mt-6 space-y-4">
                            <li><a href="#servicios"
                                    class="text-sm leading-6 text-gray-300 hover:text-white">Servicios</a></li>
                            <li><a href="#galeria" class="text-sm leading-6 text-gray-300 hover:text-white">Trabajos</a>
                            </li>
                            <li><a href="#videos" class="text-sm leading-6 text-gray-300 hover:text-white">Videos</a>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-10 md:mt-0">
                        <h3 class="text-sm font-semibold leading-6 text-white">Contacto</h3>
                        <ul role="list" class="mt-6 space-y-4">
                            <li class="flex items-center gap-x-2 text-sm leading-6 text-gray-300">
                                <span>📍 {{ $settings['address'] ?? 'Dirección del estudio' }}</span>
                            </li>
                            <li class="flex items-center gap-x-2 text-sm leading-6 text-gray-300">
                                <span>📞 {{ $settings['phone'] ?? '+54 9 11 ...' }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-16 border-t border-gray-white/10 pt-8 sm:mt-20 lg:mt-24">
            <p class="text-xs leading-5 text-gray-400">&copy; {{ date('Y') }} Bonita Studio. Todos los derechos
                reservados.</p>
        </div>
    </div>
</footer>