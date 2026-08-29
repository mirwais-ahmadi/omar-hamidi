@php
    $offices = array_values(array_filter(array_map('trim', preg_split('/·|•|,/', $network['offices'] ?? '') ?: [])));
@endphp

<section class="border-y border-line bg-mist py-20 sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal grid gap-8 lg:grid-cols-2 lg:items-center">
            <div>
                <p class="text-sm font-semibold text-brand">{{ __('Distribution presence') }}</p>
                <h2 class="mt-3 text-3xl font-extrabold text-ink">{{ $network['title'] ?? '' }}</h2>
                <p class="mt-4 text-base leading-8 text-ink-soft">{{ $network['p1'] ?? '' }}</p>
                <p class="mt-4 text-base leading-8 text-ink-soft">{{ $network['p2'] ?? '' }}</p>
                <div class="mt-6 flex flex-wrap gap-3 text-sm font-semibold text-brand-deep">
                    @foreach ($offices as $office)
                        <span class="rounded-xl border border-line bg-white px-4 py-2">{{ $office }}</span>
                    @endforeach
                </div>
            </div>
            <div class="reveal reveal-delay-1 overflow-hidden rounded-[2rem]">
                <img src="{{ asset($network['image'] ?? 'images/hamidi/healthcare.png') }}" alt="{{ __('Distribution Network') }}" class="w-full object-cover">
            </div>
        </div>
    </div>
</section>
