@php
    $competitive = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $network['competitive'] ?? '') ?: [])));
    $markets = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $network['markets'] ?? '') ?: [])));
@endphp

<section class="bg-mist py-20 sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-2">
            <div class="reveal">
                <p class="text-sm font-semibold text-brand">{{ __('Competitive advantages') }}</p>
                <h2 class="mt-3 text-2xl font-extrabold text-ink sm:text-3xl">{{ __('Distinct capabilities') }}</h2>
                <ul class="mt-6 space-y-3 text-sm leading-7 text-ink-soft">
                    @foreach ($competitive as $line)
                        <li>• {{ $line }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="reveal reveal-delay-1">
                <p class="text-sm font-semibold text-brand">{{ __('Target market') }}</p>
                <h2 class="mt-3 text-2xl font-extrabold text-ink sm:text-3xl">{{ __('Health system partners') }}</h2>
                <div class="mt-6 grid grid-cols-2 gap-3 text-sm">
                    @foreach ($markets as $market)
                        <div class="rounded-xl border border-line bg-white px-4 py-3 text-ink-soft">{{ $market }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
