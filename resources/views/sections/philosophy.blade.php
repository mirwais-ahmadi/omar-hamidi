@php
    $commitments = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $about['commitments'] ?? '') ?: [])));
@endphp

<section class="bg-white py-20 sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal mx-auto max-w-2xl text-center">
            <p class="text-sm font-semibold text-brand">{{ __('Philosophy & Commitment') }}</p>
            <h2 class="mt-3 text-3xl font-extrabold text-ink">{{ $about['philosophy_title'] ?? '' }}</h2>
        </div>
        <div class="reveal mt-10 mx-auto max-w-3xl text-center text-base leading-8 text-ink-soft sm:text-lg sm:leading-9">
            <p>{{ $about['philosophy_text'] ?? '' }}</p>
        </div>
        <div class="mt-12 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($commitments as $i => $value)
                <div class="reveal {{ $i ? 'reveal-delay-'.min($i,3) : '' }} rounded-2xl border border-line bg-mist/60 px-5 py-6 text-center">
                    <p class="font-semibold text-ink">{{ $value }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
