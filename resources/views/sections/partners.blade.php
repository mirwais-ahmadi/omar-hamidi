<section class="bg-white py-16 sm:py-20">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal text-center">
            <p class="text-sm font-semibold text-brand">{{ __('Strategic Partners') }}</p>
            <h2 class="mt-3 text-2xl font-extrabold text-ink sm:text-3xl">{{ $partners['title'] ?? '' }}</h2>
            <p class="mx-auto mt-4 max-w-2xl text-sm leading-7 text-ink-soft">{{ $partners['intro'] ?? '' }}</p>
            <div class="mt-8 flex flex-wrap justify-center gap-3">
                @foreach ($partnerItems as $partner)
                    <span class="font-latin rounded-xl border border-line bg-mist px-5 py-3 text-sm font-semibold text-ink">{{ $partner->title }}</span>
                @endforeach
            </div>
        </div>
    </div>
</section>
