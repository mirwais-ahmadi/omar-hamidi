@php
    $goals = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $products['goals'] ?? '') ?: [])));
@endphp

<section class="bg-white py-20 sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal mx-auto max-w-2xl text-center">
            <p class="text-sm font-semibold text-brand">{{ __('Goals') }}</p>
            <h2 class="mt-3 text-3xl font-extrabold text-ink">{{ __('Growth path') }}</h2>
        </div>
        <div class="mt-10 grid gap-4 md:grid-cols-2">
            @foreach ($goals as $goal)
                <div class="reveal flex gap-3 rounded-2xl border border-line px-5 py-4 text-sm leading-7 text-ink-soft">
                    <span class="mt-1 text-brand">✓</span>
                    <span>{{ $goal }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>
