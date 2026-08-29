<section class="bg-white py-20 sm:py-28">
    <div class="mx-auto grid max-w-7xl items-center gap-12 px-4 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8">
        <div class="reveal order-2 lg:order-1 overflow-hidden rounded-[2rem]">
            <img
                src="{{ asset($about['image'] ?? 'images/hamidi/reception.png') }}"
                alt="{{ $settings['company_fa'] ?? __('Omar Hamidi Trading Ltd') }}"
                class="aspect-[4/3] w-full object-cover"
            >
        </div>
        <div class="reveal reveal-delay-1 order-1 lg:order-2">
            <p class="text-sm font-semibold text-brand">{{ __('About') }}</p>
            <h2 class="mt-3 text-3xl font-extrabold text-ink sm:text-4xl">
                {{ $about['title'] ?? '' }}
            </h2>
            <p class="mt-5 text-base leading-8 text-ink-soft">
                {{ $about['p1'] ?? '' }}
            </p>
            @if (! empty($about['p2']))
                <p class="mt-4 text-base leading-8 text-ink-soft">{{ $about['p2'] }}</p>
            @endif
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="{{ route('about') }}" class="rounded-xl bg-brand px-5 py-3 text-sm font-semibold text-white transition hover:bg-brand-deep">
                    {{ __('Read more') }}
                </a>
                <a href="{{ route('about') }}#leadership" class="rounded-xl border border-line px-5 py-3 text-sm font-semibold text-ink transition hover:border-brand hover:text-brand-deep">
                    {{ __('Leadership message') }}
                </a>
            </div>
        </div>
    </div>
</section>
