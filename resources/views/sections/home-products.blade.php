<section class="border-y border-line bg-mist py-20 sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal flex flex-wrap items-end justify-between gap-6">
            <div class="max-w-2xl">
                <p class="text-sm font-semibold text-brand">{{ __('Products & Services') }}</p>
                <h2 class="mt-3 text-3xl font-extrabold text-ink sm:text-4xl">{{ $products['title'] ?? __('Products & Services') }}</h2>
                <p class="mt-4 text-base leading-8 text-ink-soft">{{ $products['intro'] ?? '' }}</p>
            </div>
            <a href="{{ route('products') }}" class="text-sm font-semibold text-brand hover:text-brand-deep">
                {{ __('View all products') }} {{ app()->getLocale() === 'fa' ? '←' : '→' }}
            </a>
        </div>

        <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($productItems as $i => $item)
                <article class="reveal {{ $i ? 'reveal-delay-'.min($i, 3) : '' }} overflow-hidden rounded-3xl border border-line bg-white">
                    @if ($item->image)
                        <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="h-40 w-full object-cover bg-mist">
                    @endif
                    <div class="p-6">
                        <span class="font-latin text-xs font-bold text-brand">{{ str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) }}</span>
                        <h3 class="mt-3 text-lg font-bold text-ink">{{ $item->title }}</h3>
                        <p class="mt-3 text-sm leading-7 text-ink-soft">{{ $item->description }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
