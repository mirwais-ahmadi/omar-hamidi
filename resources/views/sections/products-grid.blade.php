<section class="bg-ink py-20 text-white sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal max-w-2xl">
            <p class="font-latin text-xs font-semibold uppercase tracking-[0.2em] text-accent">{{ __('Products & Services') }}</p>
            <h2 class="mt-3 text-3xl font-extrabold sm:text-4xl">{{ $products['title'] ?? __('Products & Services') }}</h2>
            <p class="mt-4 text-base leading-8 text-white/65">{{ $products['intro'] ?? '' }}</p>
        </div>

        <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($productItems as $i => $item)
                <article class="reveal {{ $i ? 'reveal-delay-'.min($i,3) : '' }} overflow-hidden rounded-3xl border border-white/10 bg-white/[0.04]">
                    @if ($item->image)
                        <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="h-40 w-full object-cover bg-white/5">
                    @endif
                    <div class="p-6">
                        <h3 class="text-lg font-bold">{{ $item->title }}</h3>
                        <p class="mt-3 text-sm leading-7 text-white/65">{{ $item->description }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
