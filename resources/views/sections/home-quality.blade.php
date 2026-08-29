@php
    $quality = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $products['quality_items'] ?? '') ?: [])));
    $values = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $about['values'] ?? '') ?: [])));
@endphp

<section class="bg-white py-20 sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="reveal mx-auto max-w-2xl text-center">
            <p class="text-sm font-semibold text-brand">{{ __('Quality & Values') }}</p>
            <h2 class="mt-3 text-3xl font-extrabold text-ink">{{ __('International trust') }}</h2>
            <p class="mt-4 text-base leading-8 text-ink-soft">
                {{ $about['philosophy_text'] ?? '' }}
            </p>
        </div>

        <div class="mt-12 grid gap-8 lg:grid-cols-2">
            <div class="reveal rounded-[2rem] border border-line bg-mist/50 p-7 sm:p-8">
                <h3 class="text-lg font-bold text-ink">{{ __('Quality standards') }}</h3>
                <ul class="mt-5 space-y-3 text-sm leading-7 text-ink-soft">
                    @foreach (array_slice($quality, 0, 5) as $line)
                        <li class="flex gap-3">
                            <span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-brand"></span>
                            <span>{{ $line }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="reveal reveal-delay-1">
                <h3 class="text-lg font-bold text-ink">{{ __('Core values') }}</h3>
                <div class="mt-5 grid grid-cols-2 gap-3">
                    @foreach ($values as $value)
                        <div class="rounded-2xl border border-line bg-white px-4 py-5 text-center text-sm font-semibold text-ink">
                            {{ $value }}
                        </div>
                    @endforeach
                </div>
                <a href="{{ route('products') }}" class="mt-6 inline-flex text-sm font-semibold text-brand hover:text-brand-deep">
                    {{ __('Quality details') }} {{ app()->getLocale() === 'fa' ? '←' : '→' }}
                </a>
            </div>
        </div>
    </div>
</section>
