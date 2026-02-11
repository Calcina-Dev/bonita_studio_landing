<div x-data="{
        scrollContainer: null,
        canScrollLeft: false,
        canScrollRight: true,
        init() {
            this.scrollContainer = this.$refs.container;
            this.checkScroll();
        },
        scroll(direction) {
            const scrollAmount = this.scrollContainer.clientWidth * 0.8;
            this.scrollContainer.scrollBy({
                left: direction === 'left' ? -scrollAmount : scrollAmount,
                behavior: 'smooth'
            });
        },
        checkScroll() {
            if (!this.scrollContainer) return;
            this.canScrollLeft = this.scrollContainer.scrollLeft > 10;
            this.canScrollRight = this.scrollContainer.scrollLeft < (this.scrollContainer.scrollWidth - this.scrollContainer.clientWidth - 10);
        }
    }" class="relative group/carousel my-8">
    <!-- Left Button -->
    <button x-show="canScrollLeft" x-transition.opacity @click="scroll('left')"
        class="absolute left-4 top-1/2 -translate-y-1/2 z-10 w-10 h-10 flex items-center justify-center rounded-full bg-white/80 backdrop-blur shadow-md text-gray-800 hover:bg-white hover:scale-110 transition-all focus:outline-none">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
    </button>

    <!-- Scroll Container -->
    <div x-ref="container" @scroll.debounce.50ms="checkScroll()"
        class="flex gap-6 overflow-x-auto snap-x snap-mandatory scrollbar-hide py-4 px-4 sm:px-6 lg:px-8 -mx-4 sm:-mx-6 lg:-mx-8"
        style="scrollbar-width: none; -ms-overflow-style: none;">
        {{ $slot }}
    </div>

    <!-- Right Button -->
    <button x-show="canScrollRight" x-transition.opacity @click="scroll('right')"
        class="absolute right-4 top-1/2 -translate-y-1/2 z-10 w-10 h-10 flex items-center justify-center rounded-full bg-white/80 backdrop-blur shadow-md text-gray-800 hover:bg-white hover:scale-110 transition-all focus:outline-none">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
    </button>
</div>