@php
    $messageParts = preg_split('/\n{2,}/', trim($about['leadership_message'] ?? '')) ?: [];
    $companyName = app()->getLocale() === 'en'
        ? ($settings['company_en'] ?? 'Omar Hamidi Trading Ltd')
        : ($settings['company_fa'] ?? 'شرکت تجارتی عمر حمیدی لمیتد');
@endphp

<section id="leadership" class="border-y border-line bg-mist py-16 sm:py-20">
    <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-12 lg:px-8">
        <div class="reveal lg:col-span-4">
            <p class="text-sm font-semibold text-brand">{{ __('Leadership') }}</p>
            <h2 class="mt-3 text-2xl font-extrabold text-ink sm:text-3xl">{{ $about['leadership_title'] ?? '' }}</h2>
            <div class="mt-8 overflow-hidden rounded-2xl">
                <img src="{{ asset($about['leadership_image'] ?? 'images/hamidi/leadership.png') }}" alt="{{ __('Leadership') }}" class="aspect-square w-40 object-cover object-top sm:w-48">
            </div>
            <p class="mt-4 text-sm font-semibold text-ink">{{ $about['leadership_name'] ?? '' }}</p>
            <p class="text-sm text-ink-soft">{{ $companyName }}</p>
            <p class="mt-3 text-xs leading-6 text-ink-soft">
                {{ __('CEO') }}: {{ $about['ceo_name'] ?? '' }}<br>
                {{ __('Vice CEO') }}: {{ $about['vice_name'] ?? '' }}
            </p>
        </div>
        <blockquote class="reveal reveal-delay-1 space-y-4 text-base leading-8 text-ink-soft lg:col-span-8 sm:text-lg sm:leading-9">
            @foreach ($messageParts as $part)
                <p>{{ $part }}</p>
            @endforeach
            <footer class="pt-2 text-sm font-semibold text-ink">{{ __('With respect, Leadership Board') }}</footer>
        </blockquote>
    </div>
</section>
