<section class="border-t border-line bg-brand-soft py-16 sm:py-20">
    <div class="mx-auto flex max-w-7xl flex-col items-start justify-between gap-8 px-4 sm:px-6 lg:flex-row lg:items-center lg:px-8">
        <div class="reveal max-w-2xl">
            <p class="text-sm font-semibold text-brand">{{ __('Ready to partner') }}</p>
            <h2 class="mt-3 text-3xl font-extrabold text-ink">{{ $contact['title'] ?? '' }}</h2>
            <p class="mt-4 text-base leading-8 text-ink-soft">{{ $contact['intro'] ?? '' }}</p>
            <div class="mt-5 flex flex-wrap gap-4 text-sm font-medium text-ink" dir="ltr">
                <a href="tel:{{ preg_replace('/\s+/', '', $contact['phone_1'] ?? '') }}" class="hover:text-brand">{{ $contact['phone_1'] ?? '' }}</a>
                <span class="text-line">|</span>
                <a href="mailto:{{ $contact['email'] ?? '' }}" class="hover:text-brand">{{ $contact['email'] ?? '' }}</a>
            </div>
        </div>
        <div class="reveal reveal-delay-1 flex flex-wrap gap-3">
            <a href="{{ route('contact') }}" class="rounded-xl bg-brand px-6 py-3.5 text-sm font-semibold text-white transition hover:bg-brand-deep">
                {{ __('Contact page') }}
            </a>
            <a href="{{ route('licenses') }}" class="rounded-xl border border-line bg-white px-6 py-3.5 text-sm font-semibold text-ink transition hover:border-brand hover:text-brand-deep">
                {{ __('View licenses') }}
            </a>
        </div>
    </div>
</section>
