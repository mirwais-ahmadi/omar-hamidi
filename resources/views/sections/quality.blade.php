@php
    $quality = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $products['quality_items'] ?? '') ?: [])));
    $advantages = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $products['advantage_items'] ?? '') ?: [])));
@endphp

<section class="bg-white py-20 sm:py-24">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-2">
            <div class="reveal">
                <p class="text-sm font-semibold text-brand">{{ __('Quality') }}</p>
                <h2 class="mt-3 text-3xl font-extrabold text-ink">{{ __('Quality assurance standards') }}</h2>
                <ul class="mt-6 space-y-3 text-sm leading-7 text-ink-soft">
                    @foreach ($quality as $line)
                        <li class="flex gap-3"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-brand"></span>{{ $line }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="reveal reveal-delay-1">
                <p class="text-sm font-semibold text-brand">{{ __('Advantages') }}</p>
                <h2 class="mt-3 text-3xl font-extrabold text-ink">{{ __('Why partner with us') }}</h2>
                <ul class="mt-6 space-y-3 text-sm leading-7 text-ink-soft">
                    @foreach ($advantages as $line)
                        <li class="flex gap-3"><span class="mt-2 h-1.5 w-1.5 shrink-0 rounded-full bg-brand"></span>{{ $line }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
