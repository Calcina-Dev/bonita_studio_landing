<section id="videos" class="py-24 sm:py-32 bg-gray-900">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center mb-16">
            <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl font-serif">En TikTok & Reels</h2>
            <p class="mt-2 text-lg leading-8 text-gray-400">Síguenos para ver el proceso.</p>
        </div>

        <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-8 lg:mx-0 lg:max-w-none lg:grid-cols-4">
            @foreach($videos as $video)
            <div class="flex flex-col overflow-hidden rounded-2xl bg-gray-800 shadow-lg">
                <div class="flex-1 aspect-[9/16] relative bg-black">
                    <!-- Embed logic based on platform -->
                    @if($video->platform === 'tiktok')
                    <blockquote class="tiktok-embed" cite="{{ $video->url }}"
                        data-video-id="{{ Str::afterLast($video->url, '/') }}"
                        style="max-width: 605px;min-width: 325px;">
                        <section> <a target="_blank" title="@bonitastudio" href="{{ $video->url }}">Ver en TikTok</a>
                        </section>
                    </blockquote>
                    <script async src="https://www.tiktok.com/embed.js"></script>
                    @elseif($video->platform === 'youtube')
                    <iframe class="w-full h-full absolute inset-0"
                        src="https://www.youtube.com/embed/{{ Str::afterLast($video->url, 'v=') }}" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                    @elseif($video->platform === 'instagram')
                    <iframe class="w-full h-full absolute inset-0" src="{{ $video->url }}embed" frameborder="0"
                        scrolling="no" allowtransparency="true"></iframe>
                    @else
                    <a href="{{ $video->url }}" target="_blank"
                        class="flex items-center justify-center h-full text-white hover:text-rose-500">Ver Video</a>
                    @endif
                </div>
                <div class="p-4">
                    <h3 class="text-sm font-semibold leading-6 text-white">{{ $video->title }}</h3>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>