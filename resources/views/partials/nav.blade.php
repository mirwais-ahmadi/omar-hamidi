@php
    $links = [
        ['route' => 'about', 'label' => __('About')],
        ['route' => 'products', 'label' => __('Products')],
        ['route' => 'network', 'label' => __('Distribution Network')],
        ['route' => 'licenses', 'label' => __('Licenses')],
        ['route' => 'contact', 'label' => __('Contact')],
    ];
    $currentLocale = app()->getLocale();
    $brandName = $currentLocale === 'en'
        ? ($settings['company_en'] ?? 'Omar Hamidi Trading Ltd')
        : ($settings['company_fa'] ?? 'عمر حمیدی لمیتد');
    $brandSub = $currentLocale === 'en'
        ? ($settings['company_fa'] ?? 'عمر حمیدی لمیتد')
        : ($settings['company_en'] ?? 'Omar Hamidi Trading Ltd');
@endphp

<header id="site-nav" class="fixed inset-x-0 top-0 z-50 transition-all duration-300">
    <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="group flex items-center gap-3">
            <span class="flex h-11 w-11 items-center justify-center rounded-full bg-brand text-white shadow-sm ring-2 ring-brand-soft">
                <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.8">
                    <circle cx="12" cy="12" r="8"/>
                    <path d="M4 12h16M12 4c2.5 2.8 2.5 12.2 0 16M12 4c-2.5 2.8-2.5 12.2 0 16" stroke-linecap="round"/>
                </svg>
            </span>
            <div class="leading-tight">
                <span class="block text-sm font-bold text-ink sm:text-base">{{ $brandName }}</span>
                <span @class(['block text-[11px] font-semibold tracking-wide text-ink-soft', 'font-latin' => $currentLocale === 'fa'])>{{ $brandSub }}</span>
            </div>
        </a>

        <nav class="hidden items-center gap-1 lg:flex" aria-label="{{ __('Quick access') }}">
            @foreach ($links as $link)
                <a
                    href="{{ route($link['route']) }}"
                    @class([
                        'rounded-lg px-3 py-2 text-sm font-medium transition',
                        'bg-brand-soft text-brand-deep' => request()->routeIs($link['route']),
                        'text-ink-soft hover:bg-brand-soft hover:text-brand-deep' => ! request()->routeIs($link['route']),
                    ])
                >
                    {{ $link['label'] }}
                </a>
            @endforeach
        </nav>

        <div class="flex items-center gap-2">
            <div class="flex items-center rounded-xl border border-line bg-white/80 p-1 text-xs font-semibold">
                <a
                    href="{{ route('locale.switch', 'fa') }}"
                    @class([
                        'rounded-lg px-2.5 py-1.5 transition',
                        'bg-brand text-white' => $currentLocale === 'fa',
                        'text-ink-soft hover:text-brand-deep' => $currentLocale !== 'fa',
                    ])
                    hreflang="fa"
                    lang="fa"
                >{{ __('Persian') }}</a>
                <a
                    href="{{ route('locale.switch', 'en') }}"
                    @class([
                        'rounded-lg px-2.5 py-1.5 transition font-latin',
                        'bg-brand text-white' => $currentLocale === 'en',
                        'text-ink-soft hover:text-brand-deep' => $currentLocale !== 'en',
                    ])
                    hreflang="en"
                    lang="en"
                >{{ __('English') }}</a>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="hidden rounded-xl border border-line bg-white/80 px-3 py-2.5 text-sm font-medium text-ink-soft transition hover:border-brand hover:text-brand-deep sm:inline-flex">
                {{ __('Admin') }}
            </a>
            <a href="{{ route('contact') }}" class="hidden rounded-xl bg-brand px-4 py-2.5 text-sm font-semibold text-white transition hover:bg-brand-deep sm:inline-flex">
                {{ __('Contact Us') }}
            </a>
            <button id="menu-toggle" type="button" class="inline-flex h-11 w-11 items-center justify-center rounded-xl border border-line bg-white text-ink lg:hidden" aria-controls="mobile-menu" aria-expanded="false" aria-label="Menu">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7h16M4 12h16M4 17h16" stroke-linecap="round"/></svg>
            </button>
        </div>
    </div>

    <div id="mobile-menu" class="hidden border-t border-line bg-white lg:hidden">
        <nav class="mx-auto flex max-w-7xl flex-col gap-1 px-4 py-4" aria-label="Mobile">
            @foreach ($links as $link)
                <a
                    href="{{ route($link['route']) }}"
                    @class([
                        'rounded-lg px-3 py-3 text-base font-medium',
                        'bg-brand-soft text-brand-deep' => request()->routeIs($link['route']),
                        'text-ink hover:bg-mist' => ! request()->routeIs($link['route']),
                    ])
                >
                    {{ $link['label'] }}
                </a>
            @endforeach
            <div class="mt-2 flex gap-2">
                <a href="{{ route('locale.switch', 'fa') }}" @class(['flex-1 rounded-xl border px-3 py-2.5 text-center text-sm font-semibold', 'border-brand bg-brand-soft text-brand-deep' => $currentLocale === 'fa', 'border-line text-ink-soft' => $currentLocale !== 'fa'])>{{ __('Persian') }}</a>
                <a href="{{ route('locale.switch', 'en') }}" @class(['font-latin flex-1 rounded-xl border px-3 py-2.5 text-center text-sm font-semibold', 'border-brand bg-brand-soft text-brand-deep' => $currentLocale === 'en', 'border-line text-ink-soft' => $currentLocale !== 'en'])>{{ __('English') }}</a>
            </div>
            <a href="{{ route('contact') }}" class="mt-2 rounded-xl bg-brand px-4 py-3 text-center text-sm font-semibold text-white">{{ __('Contact Us') }}</a>
            <a href="{{ route('admin.dashboard') }}" class="rounded-xl border border-line px-4 py-3 text-center text-sm font-medium text-ink-soft">{{ __('Admin Panel') }}</a>
        </nav>
    </div>
</header>
