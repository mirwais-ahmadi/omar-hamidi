@php
    $messageParts = preg_split('/\n{2,}/', trim($about['leadership_message'] ?? '')) ?: [];
    $companyName = app()->getLocale() === 'en'
        ? ($settings['company_en'] ?? 'Omar Hamidi Trading Ltd')
        : ($settings['company_fa'] ?? 'شرکت تجارتی عمر حمیدی لمیتد');
    $ceoImage = $about['leadership_image'] ?? 'images/hamidi/leadership.png';
    $viceImage = $about['vice_image'] ?? null;
@endphp

<section id="leadership" class="border-y border-line bg-mist py-16 sm:py-20">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-12 lg:px-8">
        <div class="reveal lg:col-span-4">
            <p class="text-sm font-semibold text-brand">{{ __('Leadership') }}</p>
            <h2 class="mt-3 text-2xl font-extrabold text-ink sm:text-3xl">{{ $about['leadership_title'] ?? '' }}</h2>
            <p class="mt-2 text-sm text-ink-soft">{{ $companyName }}</p>

            <div class="mt-8 grid grid-cols-2 gap-4">
                <figure>
                    <div class="overflow-hidden rounded-2xl bg-white ring-1 ring-line">
                        <img
                            src="{{ asset($ceoImage) }}"
                            alt="{{ $about['ceo_name'] ?? __('CEO') }}"
                            class="aspect-square w-full object-cover object-top"
                        >
                    </div>
                    <figcaption class="mt-3 text-center">
                        <p class="text-sm font-semibold text-ink">{{ $about['ceo_name'] ?? '' }}</p>
                        <p class="mt-0.5 text-xs text-ink-soft">{{ __('CEO') }}</p>
                    </figcaption>
                </figure>
                <figure>
                    <div class="overflow-hidden rounded-2xl bg-white ring-1 ring-line">
                        @if ($viceImage)
                            <img
                                src="{{ asset($viceImage) }}"
                                alt="{{ $about['vice_name'] ?? __('Vice CEO') }}"
                                class="aspect-square w-full object-cover object-top"
                            >
                        @else
                            <div class="flex aspect-square w-full items-center justify-center bg-brand-soft text-sm font-semibold text-brand-deep">
                                {{ __('Vice CEO') }}
                            </div>
                        @endif
                    </div>
                    <figcaption class="mt-3 text-center">
                        <p class="text-sm font-semibold text-ink">{{ $about['vice_name'] ?? '' }}</p>
                        <p class="mt-0.5 text-xs text-ink-soft">{{ __('Vice CEO') }}</p>
                    </figcaption>
                </figure>
            </div>
        </div>
        <blockquote class="reveal reveal-delay-1 space-y-4 text-base leading-8 text-ink-soft lg:col-span-8 sm:text-lg sm:leading-9">
            @foreach ($messageParts as $part)
                <p>{{ $part }}</p>
            @endforeach
            <footer class="pt-2 text-sm font-semibold text-ink">{{ __('With respect, Leadership Board') }}</footer>
        </blockquote>
    </div>
</section>
