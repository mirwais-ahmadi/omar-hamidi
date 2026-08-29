@php
    $valueLines = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $about['values'] ?? '') ?: [])));
@endphp

<section class="bg-white py-20 sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal mx-auto max-w-2xl text-center">
            <p class="text-sm font-semibold text-brand">{{ __('Vision, Mission & Values') }}</p>
            <h2 class="mt-3 text-3xl font-extrabold text-ink">{{ __('What guides us') }}</h2>
        </div>
        <div class="mt-12 grid gap-6 lg:grid-cols-3">
            <article class="reveal rounded-3xl border border-line bg-mist/70 p-7">
                <h3 class="text-lg font-bold text-ink">{{ __('Vision') }}</h3>
                <p class="mt-3 text-sm leading-7 text-ink-soft">{{ $about['vision'] ?? '' }}</p>
            </article>
            <article class="reveal reveal-delay-1 rounded-3xl border border-line bg-mist/70 p-7">
                <h3 class="text-lg font-bold text-ink">{{ __('Mission') }}</h3>
                <p class="mt-3 text-sm leading-7 text-ink-soft">{{ $about['mission'] ?? '' }}</p>
            </article>
            <article class="reveal reveal-delay-2 rounded-3xl border border-line bg-mist/70 p-7">
                <h3 class="text-lg font-bold text-ink">{{ __('Core values') }}</h3>
                <ul class="mt-3 space-y-2 text-sm leading-7 text-ink-soft">
                    @foreach ($valueLines as $line)
                        <li>{{ $line }}</li>
                    @endforeach
                </ul>
            </article>
        </div>
    </div>
</section>
