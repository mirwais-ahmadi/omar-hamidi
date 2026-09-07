<section class="bg-white py-20 sm:py-28">
    <div class="mx-auto grid max-w-7xl items-center gap-12 px-4 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8">
        <div class="reveal">
            <div class="relative overflow-hidden rounded-[2rem]">
                <img src="{{ asset($about['image'] ?? 'images/hamidi/reception.png') }}" alt="{{ $settings['company_fa'] ?? __('Omar Hamidi Trading Ltd') }}" class="aspect-[4/3] w-full object-cover">
            </div>
        </div>
        <div class="reveal reveal-delay-1">
            <p class="text-sm font-semibold text-brand">{{ __('About') }}</p>
            <h2 class="mt-3 text-3xl font-extrabold text-ink sm:text-4xl">{{ $about['title'] ?? '' }}</h2>
            <div class="mt-6 space-y-4 text-base leading-8 text-ink-soft">
                @foreach (['p1', 'p2', 'p3'] as $key)
                    @if (! empty($about[$key] ?? null))
                        <p>{{ $about[$key] }}</p>
                    @endif
                @endforeach
            </div>
            <div class="mt-8 flex flex-wrap gap-3 text-xs font-medium">
                <span class="rounded-lg bg-brand-soft px-3 py-1.5 text-brand-deep">{{ __('Gold Chamber membership') }}</span>
                <span class="rounded-lg bg-brand-soft px-3 py-1.5 text-brand-deep">{{ __('MoPH registered') }}</span>
            </div>
        </div>
    </div>
</section>
