@props([
    'title',
    'subtitle' => null,
])

<section class="hero-wash relative overflow-hidden pb-14 pt-28 text-white sm:pb-16 sm:pt-32">
    <div class="pointer-events-none absolute inset-0 surface-dots opacity-40"></div>
    <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <h1 class="max-w-3xl text-3xl font-extrabold leading-tight sm:text-4xl lg:text-5xl">{{ $title }}</h1>
        @if ($subtitle)
            <p class="mt-4 max-w-2xl text-base leading-8 text-white/70">{{ $subtitle }}</p>
        @endif
    </div>
</section>
