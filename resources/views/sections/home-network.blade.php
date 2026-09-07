@php
    $offices = array_values(array_filter(array_map('trim', preg_split('/·|•|,/', $network['offices'] ?? '') ?: [])));
@endphp

<section class="relative overflow-hidden bg-brand-deep py-20 text-white sm:py-28">
    <div class="pointer-events-none absolute inset-0 opacity-40"
         style="background: radial-gradient(ellipse 55% 50% at 85% 15%, rgba(27,154,170,0.35), transparent 55%);"></div>
    <div class="relative mx-auto grid max-w-7xl items-center gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:gap-16 lg:px-8">
        <div class="reveal">
            <p class="text-sm font-semibold text-accent">{{ __('Distribution Network') }}</p>
            <h2 class="mt-3 text-3xl font-extrabold sm:text-4xl">{{ $network['title'] ?? '' }}</h2>
            <p class="mt-5 text-base leading-8 text-white/70">{{ $network['p1'] ?? '' }}</p>
            <div class="mt-8 flex flex-wrap gap-3">
                @foreach ($offices as $office)
                    <span class="rounded-xl border border-white/15 bg-white/5 px-4 py-2 text-sm font-medium text-white/90">
                        {{ $office }}
                    </span>
                @endforeach
            </div>
            <a href="{{ route('network') }}" class="mt-8 inline-flex rounded-xl bg-white px-5 py-3 text-sm font-semibold text-brand-deep transition hover:bg-brand-soft">
                {{ __('Network details') }}
            </a>
        </div>
        <div class="reveal reveal-delay-1 overflow-hidden rounded-[2rem] border border-white/10">
            <img src="{{ asset($network['image'] ?? 'images/hamidi/healthcare.png') }}" alt="{{ __('Distribution Network') }}" class="aspect-[4/3] w-full object-cover">
        </div>
    </div>
</section>
