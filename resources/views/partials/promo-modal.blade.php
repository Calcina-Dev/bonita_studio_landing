@push('modals')
@if(isset($promotions) && count($promotions) > 0)
<div x-data="{ 
    open: true,
    init() {
        if (this.open) document.body.classList.add('overflow-hidden');
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

            <div x-show="open" x-transition:enter="ease-out duration-500"
                x-transition:enter-start="opacity-0 translate-y-8 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="ease-in duration-300"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-8 sm:translate-y-0 sm:scale-95" style="max-width: 550px;"
                class="relative transform overflow-hidden rounded-2xl bg-[#FDFBF7] text-left shadow-xl transition-all sm:my-8 w-full border border-white/60 mx-auto">

                <!-- Close Button -->
                <div class="absolute right-5 top-5 z-20">
                    <button type="button" @click="open = false"
                        class="rounded-full bg-[#F5F0EB] p-2 text-[#9C8974] hover:bg-[#EBE5DE] hover:text-[#7A6550] focus:outline-none transition-colors border border-black/5 shadow-sm">
                        <span class="sr-only">Cerrar</span>
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="pt-12 pb-8 px-8 sm:px-10">
                    <!-- Header -->
                    <div class="text-center mb-8 relative">
                        <p class="text-[11px] font-bold tracking-[0.25em] text-[#9C8974] uppercase mb-4">PROMOCIONES</p>
                        <h3 class="text-[2.5rem] font-serif text-[#4A4238] leading-tight inline-flex items-center gap-3"
                            id="modal-title">
                            Especial del mes <span class="text-2xl text-[#C5A880] animate-pulse">✨</span>
                        </h3>
                    </div>

                    <!-- Inner White Card -->
                    <div class="bg-white rounded-xl p-6 sm:p-8 shadow-sm border border-stone-200/60">
                        <div class="space-y-6">
                            @foreach($promotions as $promo)
                            <div class="flex items-start gap-5 group">
                                <!-- Icon -->
                                <div
                                    class="flex-shrink-0 text-2xl mt-0.5 transform group-hover:scale-110 transition-transform duration-300">
                                    @if(str_contains(strtolower($promo->title), 'manicure'))
                                    💅🏼
                                    @elseif(str_contains(strtolower($promo->title), 'pedicure'))
                                    🦶🏼
                                    @elseif(str_contains(strtolower($promo->title), 'diseño') ||
                                    str_contains(strtolower($promo->title), 'art'))
                                    ✨
                                    @else
                                    💖
                                    @endif
                                </div>

                                <!-- Content -->
                                <div class="flex-1">
                                    <h4
                                        class="text-xl font-serif text-[#4A4238] leading-snug mb-1 group-hover:text-[#9C8974] transition-colors">
                                        {{ $promo->title }}
                                    </h4>
                                    <!-- Content -->
                                    <div
                                        class="text-[14px] text-gray-500 font-light leading-relaxed [&>p]:m-0 [&>p>strong]:font-medium [&>p>strong]:text-[#4A4238]">
                                        {!! $promo->content !!}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="mt-8 space-y-6">
                        <!-- Date Divider (Flex) -->
                        <div class="flex items-center justify-center gap-4">
                            <div class="h-px w-16 bg-stone-300"></div>
                            <span class="text-[10px] text-stone-500 font-bold tracking-widest uppercase">
                                VIGENTE HASTA EL {{
                                \Carbon\Carbon::parse($promotions->first()->published_at)->endOfMonth()->format('d/m')
                                }}
                            </span>
                            <div class="h-px w-16 bg-stone-300"></div>
                        </div>

                        <!-- Main CTA -->
                        <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}?text=Hola,%20quisiera%20reservar%20una%20promo%20del%20mes"
                            target="_blank" style="background-color: #8B735B;"
                            class="w-full flex items-center justify-center gap-2 rounded-full px-6 py-4 text-sm font-bold text-white shadow-lg shadow-[#8B735B]/20 hover:opacity-90 hover:shadow-xl hover:shadow-[#8B735B]/30 transition-all transform hover:-translate-y-0.5 duration-300">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.008-.57-.008-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z" />
                            </svg>
                            <span>Reservar por WhatsApp</span>
                        </a>

                        <!-- Simple Close Text -->
                        <button @click="open = false"
                            class="w-full text-center text-xs text-stone-400 hover:text-stone-600 font-bold transition-colors uppercase tracking-wider">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endpush