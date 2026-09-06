<section class="bg-white py-20 sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal mx-auto max-w-2xl text-center">
            <p class="text-sm font-semibold text-brand">{{ __('Why choose us') }}</p>
            <h2 class="mt-3 text-3xl font-extrabold text-ink">{{ $why['title'] ?? __('Why Omar Hamidi') }}</h2>
            @if (! empty($why['intro']))
                <p class="mt-4 text-base leading-8 text-ink-soft">{{ $why['intro'] }}</p>
            @endif
        </div>

        <div class="mt-14 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($whyItems as $i => $item)
                <article class="reveal {{ $i ? 'reveal-delay-'.min($i, 3) : '' }} rounded-3xl border border-line bg-mist/50 p-6 sm:p-7">
                    <span class="font-latin inline-flex h-9 w-9 items-center justify-center rounded-xl bg-brand text-sm font-bold text-white">
                        {{ str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) }}
                    </span>
                    <h3 class="mt-4 text-lg font-bold text-ink">{{ $item->title }}</h3>
                    @if ($item->description)
                        <p class="mt-2 text-sm leading-7 text-ink-soft">{{ $item->description }}</p>
                    @endif
                </article>
            @endforeach
        </div>

        @if (! empty($why['closing']))
            <div class="reveal mt-16 rounded-3xl border border-line bg-brand-soft/40 px-6 py-10 text-center sm:px-10">
                <p class="mx-auto max-w-2xl text-base leading-8 text-ink sm:text-lg">{{ $why['closing'] }}</p>
                <a href="{{ route('contact') }}" class="mt-6 inline-flex rounded-xl bg-brand px-5 py-3 text-sm font-semibold text-white transition hover:bg-brand-deep">
                    {{ __('Contact Us') }}
                </a>
            </div>
        @endif
    </div>
</section>
