<section class="border-y border-line bg-mist py-20 sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal mx-auto max-w-2xl text-center">
            <p class="text-sm font-semibold text-brand">{{ __('Our Licenses') }}</p>
            <h2 class="mt-3 text-3xl font-extrabold text-ink">{{ __('Legal credibility') }}</h2>
            <p class="mt-4 text-sm leading-7 text-ink-soft">{{ $licenses['intro'] ?? '' }}</p>
        </div>
        <div class="mt-10 grid gap-6">
            <figure class="reveal overflow-hidden rounded-3xl border border-line bg-white p-3 sm:p-4">
                <div class="flex aspect-[297/210] items-center justify-center overflow-hidden rounded-2xl bg-mist/60">
                    <img
                        src="{{ asset($licenses['commerce_image'] ?? 'images/hamidi/license-commerce.png') }}"
                        alt="{{ $licenses['commerce_caption'] ?? '' }}"
                        class="max-h-full max-w-full object-contain"
                    >
                </div>
                <figcaption class="mt-3 text-center text-sm text-ink-soft">{{ $licenses['commerce_caption'] ?? '' }}</figcaption>
            </figure>
            <figure class="reveal reveal-delay-1 overflow-hidden rounded-3xl border border-line bg-white p-3 sm:p-4">
                <div class="flex aspect-[297/210] items-center justify-center overflow-hidden rounded-2xl bg-mist/60">
                    <img
                        src="{{ asset($licenses['moph_image'] ?? 'images/hamidi/license-moph.png') }}"
                        alt="{{ $licenses['moph_caption'] ?? '' }}"
                        class="max-h-full max-w-full object-contain"
                    >
                </div>
                <figcaption class="mt-3 text-center text-sm text-ink-soft">{{ $licenses['moph_caption'] ?? '' }}</figcaption>
            </figure>
        </div>
        <div class="reveal mt-8 flex flex-wrap justify-center gap-3 text-xs font-medium text-ink-soft">
            <span class="rounded-lg border border-line bg-white px-3 py-1.5">{{ __('License no.') }}: {{ $licenses['license_no'] ?? '' }}</span>
            <span class="rounded-lg border border-line bg-white px-3 py-1.5">TIN: {{ $licenses['tin'] ?? '' }}</span>
            <span class="rounded-lg border border-line bg-white px-3 py-1.5">{{ __('CEO') }}: {{ $licenses['ceo_name'] ?? '' }}</span>
            <span class="rounded-lg border border-line bg-white px-3 py-1.5">{{ __('Vice CEO') }}: {{ $licenses['vice_name'] ?? '' }}</span>
        </div>
    </div>
</section>
